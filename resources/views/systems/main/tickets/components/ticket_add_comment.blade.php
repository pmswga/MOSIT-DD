<div id="addCommentModal" class="ui tiny modal">
    <div class="header">
        Прокомментировать
    </div>
    <div class="content">
        <form class="ui form" method="POST" action="{{ route('tickets.addComment', $ticket) }}">
            @method('PUT')
            @csrf
            <div class="field">
                <label>Комментарий</label>
                <textarea name="comment"></textarea>
            </div>
            <div class="fluid">
                <input type="submit" value="Прокомментировать" class="ui fluid primary button">
            </div>
        </form>
    </div>
</div>
