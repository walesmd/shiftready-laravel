@props([
    'wireRawAddress' => 'rawAddress',
    'wirePlaceId' => 'placeId',
    'label' => 'Address',
])

<div
    x-data="addressInput"
    data-wire-raw-address="{{ $wireRawAddress }}"
    data-wire-place-id="{{ $wirePlaceId }}"
    @keydown.window.capture="onKeydown($event)"
    class="relative"
>
    <label class="form-label" for="address-input-{{ $wireRawAddress }}">{{ $label }}</label>
    <input
        id="address-input-{{ $wireRawAddress }}"
        x-ref="input"
        type="text"
        class="form-input"
        x-model="currentValue"
        @input="onInput($event)"
        @blur="onBlur()"
        autocomplete="off"
        placeholder="Start typing your address..."
    />
    <x-input-error :messages="$errors->get($wireRawAddress)" class="mt-2" />

    <ul
        x-ref="dropdown"
        x-show="open"
        x-cloak
        class="absolute z-10 mt-1 w-full rounded-md border border-gray-200 bg-white shadow-lg"
        role="listbox"
    >
        <template x-for="prediction in predictions" :key="prediction.place_id">
            <li>
                <button
                    type="button"
                    data-suggestion
                    class="w-full px-4 py-2 text-left text-sm hover:bg-gray-100 focus:bg-gray-100 focus:outline-none"
                    @mousedown.prevent="selectPrediction(prediction)"
                    @keydown.enter.prevent="selectPrediction(prediction)"
                    x-text="prediction.description"
                    role="option"
                ></button>
            </li>
        </template>
    </ul>
</div>
