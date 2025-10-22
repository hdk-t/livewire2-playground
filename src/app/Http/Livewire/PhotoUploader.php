<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class PhotoUploader extends Component
{
    use WithFileUploads;

    public $photo = null;
    public array $uploadedPhotos = [];

    /**
     * Livewireライフサイクルフック
     * アップロード済み画像一覧を設定する
     */
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
     * Livewireライフサイクルフックにより、ファイル選択時に呼び出されることで、
     * リアクティブなバリデーションが実現できる。
     */
    public function updatedPhoto()
    {
        $this->validatePhoto();
    }

    /**
     * ファイル保存処理
     * 
     * ファイル自体は選択時にサーバーの一時ディレクトリにアップロードされているため、
     * ここではそのファイルを永続化する処理を行う。
     */
    public function save()
    {
        if (is_null($this->photo)) {
            return;
        }
        $this->resetErrorBag();
        $this->validatePhoto();
        $this->photo->store('public/photos');
        $this->photo = null;
        $this->uploadedPhotos = $this->getUploadedPhotos();
    }

    /**
     * アップロード済みファイル一覧を取得する
     */
    private function getUploadedPhotos()
    {
        $uploadedPhotos = [];
        $files = Storage::files('public/photos');
        // リンクに変換
        foreach ($files as $file) {
            $uploadedPhotos[] = Storage::url($file);
        }
        return $uploadedPhotos;
    }

    /**
     * ファイルのバリデーション
     */
    private function validatePhoto()
    {
        $this->validate([
            'photo' => ['file', 'max:1024', 'mimes:jpg,jpeg,png'],
        ]);
    }
}
