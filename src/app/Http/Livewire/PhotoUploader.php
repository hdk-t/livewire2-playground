<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class PhotoUploader extends Component
{
    use WithFileUploads;

    public $photo = null;
    public int $photoIteration = 0;
    public array $uploadedPhotos = []; 

    public function mount()
    {
        $this->uploadedPhotos = $this->getUploadedPhotos();
    }

    public function render()
    {
        return view('livewire.photo-uploader');
    }

    /**
     * リアルタイムバリデーション
     * 
     * Livewireライフサイクルフックにより、ファイルが選択(一時ディレクトリにアップロード)
     * された際に呼び出されるため、リアクティブなバリデーションを実現できる。
     */
    public function updatedPhoto($file)
    {
        // dd($file);
        $this->validatePhoto();
    }

    /**
     * アップロード処理
     * 
     * 厳密にはファイル自体は選択時に一時ディレクトリにアップロードされているため、
     * ここではそのファイルを永続化する処理を行う。
     */
    public function upload()
    {
        $this->resetErrorBag();
        $this->validatePhoto();
        $this->photo->store('public/photos');
        // $this->reset('photo');
        $this->photo = null;
        $this->photoIteration++;
        $this->uploadedPhotos = $this->getUploadedPhotos();
    }

    /**
     * filesディレクトリからアップロード済みファイル一覧を取得する
     */
    private function getUploadedPhotos()
    {
        $uploadedPhotos = [];
        $photos = Storage::files('public/photos');
        // リンクに変換
        foreach ($photos as $photo) {
            $uploadedPhotos[] = Storage::url($photo);
        }
        return $uploadedPhotos;
    }

    /**
     * バリデーション処理
     */
    private function validatePhoto()
    {
        $this->validate([
            'photo' => ['file', 'max:1024', 'mimes:jpg,jpeg,png'],
        ]);
    }
}
