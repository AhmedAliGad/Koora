<div class="modal delete-modal">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title"><span class="status-name"></span></p>
      <button class="delete close-modal" aria-label="close"></button>
    </header>
    <form class="delete-form" method="POST" action="" accept-charset="UTF-8">
        <input name="_method" type="hidden" value="DELETE">
        <input name="_token" type="hidden" value="{{ csrf_token() }}">
      <section class="modal-card-body">
        <p class="delete-text">Delete :  <strong></strong></p>
      </section>
      <footer class="modal-card-foot">
        <button type="submit" class="button is-success">Confirm</button>
        <button class="button close-modal">Cancel</button>
      </footer>
    </form>
  </div>
</div>
