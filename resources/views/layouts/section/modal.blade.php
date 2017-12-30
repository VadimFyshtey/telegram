<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Добавление канала</h4>
            </div>
            <div id="load"></div>
            <br/>
            <div class="col-lg-12">
                <div class="myerror">
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

            <div class="modal-body">
                <form action="{{ route('add_channel') }}" method="post" id="addChannelForm">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="channel">Ссылка на канал:</label>
                        <input name="url" type="text" class="form-control" id="channel" placeholder="https://t.me/rap_american">
                    </div>
                    <div class="form-group">
                        <label for="category">Категория: </label>
                        <select name="category" id="category">
                            @foreach($category as $categ)
                                <option value="{{ $categ['id'] }}">{{ $categ['name'] }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
                        <button type="submit" id="submitChannel" class="btn btn-primary">Добавить</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>