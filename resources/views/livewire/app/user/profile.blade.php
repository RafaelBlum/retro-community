<x-filament::section>
    <x-slot name="heading">
        Profile Detail
    </x-slot>

    <x-filament-panels::form wire:submit="save">
        <div x-data="{ photoName: null, photoPreview: null }" class="space-y-2">
            <input type="file" class="hidden" wire:model.live="photo" x-ref="photo"
                   x-on:change="
                    photoName = $refs.photo.files[0].name;
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        photoPreview = e.target.result;
                    };
                    reader.readAsDataURL($refs.photo.files[0]);
            " />

            <x-filament-forms::field-wrapper.label for="photo" class="!mt-0">
                Avatar
            </x-filament-forms::field-wrapper.label>

            <x-filament::grid @class(['gap-4 items-center']) default="2" style="grid-template-columns: auto 1fr;">
                <x-filament::grid.column>
                    <div x-show="! photoPreview">
                        <x-filament-panels::avatar.user style="height: 5rem; width: 5rem;" />
                    </div>

                    <template x-if="photoPreview">
                        <img :src="photoPreview"
                             style="height: 5rem; width: 5rem; border-radius: 9999px; object-fit: cover;">
                    </template>
                </x-filament::grid.column>

                <x-filament::grid.column>
                    <x-filament::button size="sm" x-on:click.prevent="$refs.photo.click()">
                        New Avatar
                    </x-filament::button>

                    @if (isset(auth()->user()->avatar))
                        <x-filament::button size="sm" color="danger" wire:click="deleteAvatar">
                            Remove
                        </x-filament::button>
                    @endif
                </x-filament::grid.column>
            </x-filament::grid>

            <x-app.input-error for="photo" />
        </div>

        {{ $this->form }}

        <div class="text-left">
            <x-filament::button type="submit" wire:target="photo">
                Save
            </x-filament::button>
        </div>
    </x-filament-panels::form>
</x-filament::section>

