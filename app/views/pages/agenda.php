<?php include APPROOT . "/views/fragments/dashboardNav.php"; ?>
<div class="container">
    <div id='calendar'></div>
    <div id="modal">
        <div id="im-not-gonna-fix-this-shit-code" class="modal"  tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <p>Modal body text goes here.</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary">Save changes</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
    </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.3.2/main.min.js"></script>
<script src="<?php echo URLROOT; ?>/js/agenda.js"></script>

<?php include APPROOT . "/views/fragments/footer.php"; ?>