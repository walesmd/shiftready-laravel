/**
 * Alpine component for the address autocomplete input.
 * Registered via Alpine.data() so it works reliably inside Livewire components.
 * Wire property names are read from data-wire-raw-address / data-wire-place-id attributes.
 */
const addressInputFactory = () => ({
    open: false,
    predictions: [],
    // Use Math.random() — crypto.randomUUID() requires HTTPS and fails on HTTP.
    sessionToken: Math.random().toString(36).slice(2) + Math.random().toString(36).slice(2),
    debounceTimer: null,
    currentValue: '',
    wireRawAddress: '',
    wirePlaceId: '',

    init() {
        this.wireRawAddress = this.$el.dataset.wireRawAddress;
        this.wirePlaceId = this.$el.dataset.wirePlaceId;
        this.currentValue = this.$wire.get(this.wireRawAddress) || '';
    },

    onInput(event) {
        this.currentValue = event.target.value;
        this.$wire.set(this.wireRawAddress, this.currentValue, false);
        clearTimeout(this.debounceTimer);
        if (this.currentValue.length < 3) {
            this.predictions = [];
            this.open = false;
            return;
        }
        this.debounceTimer = setTimeout(() => this.fetchPredictions(this.currentValue), 300);
    },

    async fetchPredictions(input) {
        try {
            const params = new URLSearchParams({ input, session_token: this.sessionToken });
            const response = await fetch('/api/places/autocomplete?' + params.toString());
            if (!response.ok) { return; }
            const data = await response.json();
            this.predictions = data.predictions ?? [];
            this.open = this.predictions.length > 0;
        } catch (e) {
            this.predictions = [];
            this.open = false;
        }
    },

    selectPrediction(prediction) {
        this.currentValue = prediction.description;
        this.$wire.set(this.wirePlaceId, prediction.place_id, false);
        this.$wire.set(this.wireRawAddress, prediction.description, false);
        this.predictions = [];
        this.open = false;
    },

    onBlur() {
        setTimeout(() => { this.open = false; }, 150);
    },

    onKeydown(event) {
        if (!this.open) { return; }
        const items = this.$refs.dropdown?.querySelectorAll('[data-suggestion]');
        if (!items || items.length === 0) { return; }
        const current = this.$refs.dropdown.querySelector('[data-suggestion]:focus');
        const idx = current ? Array.from(items).indexOf(current) : -1;

        if (event.key === 'ArrowDown') {
            event.preventDefault();
            const next = items[idx + 1] ?? items[0];
            next?.focus();
        } else if (event.key === 'ArrowUp') {
            event.preventDefault();
            const prev = items[idx - 1] ?? items[items.length - 1];
            prev?.focus();
        } else if (event.key === 'Escape') {
            this.open = false;
            this.$refs.input?.focus();
        }
    },
});

// Register when Alpine initialises (fires before Alpine processes the DOM on page load).
document.addEventListener('alpine:init', () => {
    Alpine.data('addressInput', addressInputFactory);
});

// Fallback: if alpine:init already fired (e.g. Livewire started Alpine synchronously
// before this deferred module ran), register directly via window.Alpine.
if (window.Alpine) {
    window.Alpine.data('addressInput', addressInputFactory);
}
