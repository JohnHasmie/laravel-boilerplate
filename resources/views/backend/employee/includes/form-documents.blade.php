<div class="mb-4">
    <h4 class="text-center mb-4 text-info border-bottom d-inline-block">Documents </h4>

    <div class="container">
        <div class="row">
            @foreach ($typeDocument::all() as $document)
                <div class="row m-2">
                    <div class="card" style="width: 15.5rem;">
                        <img 
                            src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22200%22%20height%3D%22200%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20200%20200%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_17b9d0dc80c%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A10pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_17b9d0dc80c%22%3E%3Crect%20width%3D%22200%22%20height%3D%22200%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2274.421875%22%20y%3D%22104.65%22%3E200x200%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" 
                            alt="{{ $document->label }}" 
                            class="img-thumbnail rounded preview-document"
                        >

                        <div class="card-body">
                            <h5 class="card-title">@lang($document->label)</h5>
                            <input 
                                type="file"     
                                name="documents[{{ $document->key }}]" 
                                class="form-control-file"
                                placeholder="{{ __('Photo') }}"
                                value="{{ old('photo') }}"
                            />
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>