<!-- Modal -->
<div aria-hidden="true" aria-labelledby="exampleModalLongTitle" class="modal fade" id="add-event" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">
                    Add  Event
                </h5>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">
                        ×
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/event" method="POST" id="add-event-form">
                    {!! csrf_field() !!}
                    <div class="form-group">
                      <label for="exampleInputEmail1">Event detail</label>
                      <input type="text" name="title" class="form-control" placeholder="Event detail">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Date</label>
                      <input type="date" name="date" class="form-control" >
                    </div>


                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal" type="button">
                    Close
                </button>
                <button class="btn btn-primary" type="button" onclick="$('#add-event-form').submit();">
                    Add Event
                </button>
            </div>
        </div>
    </div>
</div>