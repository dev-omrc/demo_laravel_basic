@foreach($distros->chunk(3) as $distroChunk)
    <div class="row">
    @foreach($distroChunk as $distro)
    <div class="col-sm card" style="width: 18rem;">
        @if($distro->image_path)
            <img class="card-img-top" src="{{ asset('storage/'.$distro->image_path) }}" alt="Card image cap" style="width: 128px">
        @else
            <img class="card-img-top" src="{{ asset('storage/images/no_image.png') }}" alt="Card image cap" style="width: 128px">
        @endif
        <div class="card-body">
            <h5 class="card-title">{{ $distro->name }}</h5>
            <div class="btn-group">
                <button class="btn btn-info" value="{{ $distro->id }}" onclick="getDistroData(this.value)">
                <i class="fas fa-edit"></i>
                </button>
                <button class="btn btn-danger" value="{{ $distro->id }}" onclick="deleteDistro(this.value)">
                <i class="fas fa-trash-alt"></i>
                </button>
            </div>
        </div>
    </div>
@endforeach
    </div>
    <hr>
@endforeach