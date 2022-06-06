<div class="card-style mb-30">
    <h6 class="mb-25">IMDB Films</h6>
    <form wire:submit.prevent="uploadVideo">
        <div class="input-style-1">
            <label>Film name</label>
            <input type="text" wire:model="imdb_title" placeholder="Film title"/>
            <span class="lni lni-search" wire:click="searchImdb"></span>
        </div>

        <div class="input-style-3">
           <select>
               @foreach($imdb_films as $film)
                   <option value="{{$film['id']}}">{{$film['title']}}</option>
                @endforeach
           </select>
        </div>
        <button id="cl" type="button">select</button>
        <button type="submit">Send</button>
    </form>

</div>

