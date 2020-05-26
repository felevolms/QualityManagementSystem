<div class="modal fade" id="{{$modalId}}" tabindex="-1" role="dialog" aria-labelledby="Usuń">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalTitle">Potwierdź usunięcie</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="offcanvas--text font-weight-bold">Na pewno chcesz usunąć {{$name}}?</p>
            </div>
            <div class="modal-footer">
                <form method="post" action="{{$action}}" class="m-0">
                    @method('DELETE')
                    @csrf
                    <button type="button" class="btn btn-success" data-dismiss="modal">Anuluj</button>
                    <button type="submit" class="btn btn-danger" name="delete_dividend" value="foo">Usuń</button>
                </form>
            </div>
        </div>
    </div>
</div>
