<header id="header">
    <button id="button-aside"><i class="fa fa-bars" aria-hidden="true"></i></button>
    <div class="btn-group xxx">
        <a href="{{ URL::previous() }}" class="btn btn-outline-primary"><i
                    class="fa fa-step-backward"></i></a>
        <button type="submit" name="save" value="save" class="btn btn-outline-success"><i
                    class="fa fa-check"></i> СОХРАНИТЬ
        </button>
        <button type="submit" name="delete" value="delete" class="btn btn-outline-danger"><i
                    class="fa fa-trash"></i> УДАЛИТЬ
        </button>
    </div>
    <a href="/admin" class="home pull-xs-right"><i class="fa fa-home" aria-hidden="true"></i></a>
</header>
