<div>
    <div wire:loading wire:target="photo">Uploading...</div>
    <input type="file" wire:model="photo" id="upload_{{ $iteration }}">
    <br><br>
    <button type="submit" wire:click="addimage" >Upload Image</button>
    @error('photo') <span class="error">{{ $message }}</span> @enderror
    @if (session()->has('message'))

    <div x-data="{ showMessage: true }" x-show="showMessage" x-init="setTimeout(() => showMessage = false, 3000)">
    <span>{{session('message')}}</span>
    </div>

    @endif
</div>
