<div>
    <h1>アップロード</h1>
    <form wire:submit.prevent="upload">
        <p>
            <input type="file" wire:model="photo">
        </p>
        {{-- 進捗インジケータ --}}
        <div wire:loading wire:target="photo">アップロード中...</div>
        @error('photo')
            <p style="color:red;">
                {{ $message }}
            </p>
        @enderror
        <p>
            <button type="submit">保存</button>
        </p>
    </form>
    <h1>アップロード済み画像一覧</h1>
    @forelse ($uploadedPhotos as $uploadedPhoto)
        <ul>
            <img src="{{ $uploadedPhoto }}"></img></li>
        </ul>
    @empty
        <span>アップロードされたファイルはありません。</span>
    @endforelse
</div>
