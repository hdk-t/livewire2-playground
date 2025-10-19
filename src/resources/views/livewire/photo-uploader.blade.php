<div>
    <h1>アップロード</h1>
    <form wire:submit.prevent="upload">
        <input type="file" wire:model="photo" wire:key="{{ $photoIteration }}">
        @error('photo')
        <span style="color:red;">
            {{ $message }}
        </span>
        @enderror
        <button type="submit">保存</button>
    </form>
    <h1>アップロード済みファイル</h1>
    @forelse ($uploadedPhotos as $uploadedPhoto)
        <ul>
            <img src="{{ $uploadedPhoto }}"></img></li>
        </ul>
    @empty
        <span>アップロードされたファイルはありません。</span>
    @endforelse
</div>
