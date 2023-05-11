<template>
    <div>
        <div class="columns is-multiline">
            <div class="column is-3">
                <div class="flex-card">
                    <div class="p-4 text-white has-background-primary">
                        <div class="icon-header">
                        <span class="icon-header-body">
                            <i class="fas fa-phone"></i>
                        </span>
                        </div>
                        <span class="has-text-white has-text-weight-bold">Total Calls</span>
                    </div>
                    <div class="content">
                        <div class="card-title is-tile is-styled has-text-right">
                            <div class="card-stat accent has-text-right is-size-4 has-text-weight-bold">{{ totalCalls }}</div>
                        </div>
                        <div class="mt-2 more">
                        </div>
                    </div>
                </div>
            </div>
            <div class="column is-3">
                <div class="flex-card">
                    <div class="p-4 text-white has-background-primary">
                        <div class="icon-header">
                        <span class="icon-header-body">
                            <i class="fa fa-clock"></i>
                        </span>
                        </div>
                        <span class="has-text-white has-text-weight-bold">Total Duration</span>
                    </div>
                    <div class="content">
                        <div class="card-title is-tile is-styled has-text-right">
                            <div class="card-stat accent has-text-right is-size-4 has-text-weight-bold">{{ totalDurations }}</div>
                        </div>
                        <div class="mt-2 more">
                        </div>
                    </div>
                </div>
            </div>
<!--            <div class="column is-3">
                <div class="flex-card">
                    <div class="p-4 text-white has-background-primary">
                        <div class="icon-header">
                        <span class="icon-header-body">
                            <i class="fa fa-stopwatch"></i>
                        </span>
                        </div>
                        <span class="has-text-white has-text-weight-bold">Total Waiting</span>
                    </div>
                    <div class="content">
                        <div class="card-title is-tile is-styled has-text-right">
                            <div class="card-stat accent has-text-right is-size-4 has-text-weight-bold">{{ totalWaiting }}</div>
                        </div>
                        <div class="mt-2 more">
                        </div>
                    </div>
                </div>
            </div>-->
        </div>

        <div id="video-container" v-show="callPlaced">
            <div id="local-video"></div>
            <div id="remote-video"></div>
            <div class="action-btns">
                <button type="button" class="button is-link" @click="handleAudioToggle">
                    {{ mutedAudio ? "Unmute" : "Mute" }}
                </button>
                <button
                    type="button"
                    class="button is-primary mx-4"
                    @click="handleVideoToggle"
                >
                    {{ mutedVideo ? "ShowVideo" : "HideVideo" }}
                </button>
                <button type="button" class="button is-danger" @click="endCall">
                    EndCall
                </button>
            </div>
        </div>

        <hr />
        <div class="card main-card">
            <!-- Start Card Header -->
            <div class="card-header">
                <p>
                    <span>Calls List</span>
                </p>
            </div>

            <!-- End Card Header -->
            <div class="card-content">
                <div class="table-container">
                    <table class="table is-fullwidth">
                        <thead>
                        <tr>
                            <th>Code</th>
                            <th>Channel Name</th>
                            <th>Pharmacy</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr v-for="(call, index) in video_calls" :key="index">
                            <td>{{ call.id }}</td>
                            <td>{{ call.channel_name }}</td>
                            <td>{{ call.pharmacy }}</td>
                            <td>
                                <div class="buttons has-addons">
                                    <a class="button is-warning"  @click="joinRoom(call.channel_name, call.id)"> Answer </a>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer with-pagination">
            </div>
        </div>
    </div>
</template>

<script>
import AgoraRTC from "agora-rtc-sdk-ng"
const agoraEngine = AgoraRTC.createClient({ mode: "rtc", codec: "vp8" });
let channelParameters =
    {
        // A variable to hold a local audio track.
        localAudioTrack: null,
        // A variable to hold a local video track.
        localVideoTrack: null,
        // A variable to hold a remote audio track.
        remoteAudioTrack: null,
        // A variable to hold a remote video track.
        remoteVideoTrack: null,
        // A variable to hold the remote user id.s
        remoteUid: null,
    };
const localPlayerContainer = document.createElement('div');
const remotePlayerContainer = document.createElement('div');

export default {
    name: "AgentCalls",
    props: {
    },
    created() {

        this.video_calls = [];
        this.timer = setInterval(this.getCalls, 10000);
        //this.newNotifications();
    },
    mounted () {
        this.getCalls();
    },
    data() {
        return {
            video_calls: [],
            callPlaced: false,
            mutedAudio: false,
            mutedVideo: false,
            call_id: null,
            totalDurations: Number,
            totalCalls : Number,
        }
    },
    methods : {
        async getCalls(){
            await axios.get('/dashboard/video_calls')
                .then(function (response) {
                    this.video_calls = response.data.data;
                    this.totalDurations = response.data.totalDurations;
                    this.totalCalls = response.data.totalCalls;
                }.bind(this));
        },
        async joinRoom(channel, id) {
            this.callPlaced = true;
            this.call_id = id;

            localPlayerContainer.style.width = "100%";
            localPlayerContainer.style.height = "100%";
            localPlayerContainer.style.position = "absolute";
            localPlayerContainer.style.left = "10px";
            localPlayerContainer.style.bottom = "10px";
            localPlayerContainer.style.zIndex = "2";
            localPlayerContainer.style.cursor = "pointer"

            // Set the remote video container size.
            remotePlayerContainer.style.width = "100%";
            remotePlayerContainer.style.height = "100%";
            remotePlayerContainer.style.padding = "0";
            remotePlayerContainer.style.margin = "0";
            localPlayerContainer.style.left = "0";
            localPlayerContainer.style.bottom = "0";
            localPlayerContainer.style.right = "0";
            localPlayerContainer.style.top = "0";


            agoraEngine.on("user-published", async (user, mediaType) =>
            {
                // Subscribe to the remote user when the SDK triggers the "user-published" event.
                await agoraEngine.subscribe(user, mediaType);
                console.log("subscribe success");
                // Subscribe and play the remote video in the container If the remote user publishes a video track.
                if (mediaType == "video")
                {
                    // Retrieve the remote video track.
                    channelParameters.remoteVideoTrack = user.videoTrack;
                    // Retrieve the remote audio track.
                    channelParameters.remoteAudioTrack = user.audioTrack;
                    // Save the remote user id for reuse.
                    channelParameters.remoteUid = user.uid.toString();
                    // Specify the ID of the DIV container. You can use the uid of the remote user.
                    remotePlayerContainer.id = user.uid.toString();
                    channelParameters.remoteUid = user.uid.toString();
                    // Append the remote container to the page body.
                    document.getElementById('remote-video').append(remotePlayerContainer);

                    channelParameters.remoteVideoTrack.play(remotePlayerContainer);
                }
                // Subscribe and play the remote audio track If the remote user publishes the audio track only.
                if (mediaType == "audio")
                {
                    // Get the RemoteAudioTrack object in the AgoraRTCRemoteUser object.
                    channelParameters.remoteAudioTrack = user.audioTrack;
                    // Play the remote audio track. No need to pass any DOM element.
                    channelParameters.remoteAudioTrack.play();
                }
                // Listen for the "user-unpublished" event.
                agoraEngine.on("user-unpublished", user =>
                {
                    Vue.swal({
                        position: 'center',
                        type: 'info',
                        title:'Call is ended by client',
                        html: '',
                        showConfirmButton: false,
                        timer: 2500
                });
                    console.log(user.uid+ "has left the channel");
                    this.endCall();
                });
            });
            await agoraEngine.join("6afbb18f94d046dd95e57ab7ba6b969f", channel, null, null);
            // Create a local audio track from the audio sampled by a microphone.
            channelParameters.localAudioTrack = await AgoraRTC.createMicrophoneAudioTrack();
            // Create a local video track from the video captured by a camera.
            channelParameters.localVideoTrack = await AgoraRTC.createCameraVideoTrack();
            // Append the local video container to the page body.
            document.getElementById('local-video').append(localPlayerContainer);
            // Publish the local audio and video tracks in the channel.
            await agoraEngine.publish([channelParameters.localAudioTrack, channelParameters.localVideoTrack]);
            // Play the local video track.
            channelParameters.localVideoTrack.play(localPlayerContainer);
            axios.put('/dashboard/video_calls/'+this.call_id+'?status=on_progress')
                .then(function (response) {
                    console.log(response.messsage);
                }.bind(this))
            console.log("publish success!");
        },

        async endCall() {
            // Destroy the local audio and video tracks.
            channelParameters.localAudioTrack.close();
            channelParameters.localVideoTrack.close();
            // Remove the containers you created for the local video and remote video.
            this.removeVideoDiv(remotePlayerContainer.id);
            this.removeVideoDiv(localPlayerContainer.id);
            // Leave the channel
            await agoraEngine.leave();
            // Change call status
            axios.put('/dashboard/video_calls/'+this.call_id+'?status=finished')
                .then(function (response) {
                    console.log(response.messsage);
                }.bind(this))
            // Refresh the page for reuse
            window.location.reload();
        },

        handleAudioToggle() {
            if (this.mutedAudio) {
                channelParameters.localAudioTrack.setEnabled(true);
                this.mutedAudio = false;
            } else {
                channelParameters.localAudioTrack.setEnabled(false);
                this.mutedAudio = true;
            }
        },

        handleVideoToggle() {
            if (this.mutedVideo) {
                channelParameters.localVideoTrack.setEnabled(true);
                this.mutedVideo = false;
            } else {
                channelParameters.localVideoTrack.setEnabled(false);
                this.mutedVideo = true;
            }
        },

        removeVideoDiv(elementId) {
            console.log("Removing "+ elementId+"Div");
            let Div = document.getElementById(elementId);
            if (Div)
            {
                Div.remove();
            }
        }
    }
}
</script>

<style scoped>
main {
    margin-top: 50px;
}

#video-container {
    width: 700px;
    height: 500px;
    max-width: 90vw;
    max-height: 50vh;
    margin: 0 auto;
    border: 1px solid #099dfd;
    position: relative;
    box-shadow: 1px 1px 11px #9e9e9e;
    background-color: #fff;
}

#local-video {
    width: 30%;
    height: 30%;
    position: absolute;
    left: 10px;
    bottom: 10px;
    border: 1px solid #fff;
    border-radius: 6px;
    z-index: 2;
    cursor: pointer;
}

#remote-video {
    width: 100%;
    height: 100%;
    position: absolute;
    left: 0;
    right: 0;
    bottom: 0;
    top: 0;
    z-index: 1;
    margin: 0;
    padding: 0;
    cursor: pointer;
}

.action-btns {
    position: absolute;
    bottom: 20px;
    left: 50%;
    margin-left: -50px;
    z-index: 3;
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
}
</style>
