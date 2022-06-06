@section('css')
    <link href="https://vjs.zencdn.net/7.19.2/video-js.css" rel="stylesheet"/>
@endsection
<section class="tab-components">
    <div class="container-fluid">
        <div class="title-wrapper pt-30">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="title mb-30">
                        <h2>Create Film </h2>
                        <button class="btn btn-primary" wire:click="incrementLevel">Next</button>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>

        <div class="form-elements-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    @if($level == 0)
                        <div class="card-style mb-30">
                            <h6 class="mb-25">Input Fields</h6>
                            <form wire:submit.prevent="storeFilm">
                                <div class="input-style-1">
                                    <label>Title</label>
                                    <input type="text" wire:model="film.title" placeholder="Film title"/>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="input-style-2">
                                            <input type="text" wire:model="film.country" placeholder="Country"/>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="input-style-2">
                                            <input type="number" wire:model="film.year" min="1900" max="2099" step="1"
                                                   value="2016" placeholder="Year"/>
                                            <span class="icon"> <i class="lni lni-calendar"></i> </span>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="input-style-2">
                                            <input type="text" wire:model="film.duration" placeholder="Duration"/>
                                        </div>
                                    </div>
                                </div>


                                <div class="input-style-3">
                                    <textarea wire:model="film.description"></textarea>
                                </div>
                                <div class="input-style-3">
                                    <button class="btn btn-primary" type="submit">Next</button>
                                </div>
                            </form>
                        </div>
                    @elseif($level == 1)
                        @include('admin.Components.imdb_search')
                    @elseif($level == 2)
                        @include('admin.Components.video_upload')
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

@section('script')
    <script src="https://vjs.zencdn.net/7.19.2/video.min.js"></script>

@endsection
