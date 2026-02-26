<div class="container">
    <h1>Transfer Ownership</h1>

    <div class="user-list">
        @foreach($members as $user)
            <div class="user-item" style="display: flex; justify-content: space-between; padding: 10px; border-bottom: 1px solid #ccc;">
                <div>
                    <strong>{{ $user->name }}</strong>
                    <span style="color: #666;">({{ $user->email }})</span>
                </div>

                <form action="" method="POST">
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="new_owner_id" value="{{ $user->id }}">

                    <button type="submit"
                            style="background: #e3342f; color: white; border: none; padding: 5px 10px; cursor: pointer;"
                    </button>
                </form>
            </div>
        @endforeach
    </div>
</div>
