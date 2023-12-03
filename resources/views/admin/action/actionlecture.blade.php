<div class="d-flex">
    <a href="{{ route('lectures.edit', ['lecture' => $lectures->id]) }}" class="btn btn-primary btn-sm me-2 shadow"><i
            class="bi-info-circle"></i></a>

    <div>
        <form action="{{ route('lectures.destroy', ['lecture' => $lectures->id]) }}" method="POST">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger btn-sm me-2 btn-delete shadow">
                <i class="bi-trash"></i>
            </button>
        </form>

    </div>
</div>
