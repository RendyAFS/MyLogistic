<div class="d-flex">
    <a href="{{ route('handbags.edit', ['handbag' => $handbags->id]) }}" class="btn btn-primary btn-sm me-2 shadow"><i
            class="bi-info-circle"></i></a>

    <div>
        <form action="{{ route('handbags.destroy', ['handbag' => $handbags->id]) }}" method="POST">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger btn-sm me-2 btn-delete shadow">
                <i class="bi-trash"></i>
            </button>
        </form>

    </div>
</div>
