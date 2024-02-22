<div class="col-md-3">
    <div class="card">
        <div class="card-header">
            Sidebar
        </div>

        <div class="card-body">
            <ul class="list-group" role="tablist">

                <li role="presentation" class="list-group-item">
                    <a href="{{ route('admin.items.index') }}">
                        Ogłoszenia
                    </a>
                </li>
                <li role="presentation" class="list-group-item">
                    <a href="{{ route('admin.category.index') }}">
                        Kategorie
                    </a>
                </li>
                <li role="presentation" class="list-group-item">
                    <a href="{{ route('admin.users.index') }}">
                        Użytkownicy
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
