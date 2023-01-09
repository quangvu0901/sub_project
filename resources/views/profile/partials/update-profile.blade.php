<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update Profile') }}
        </h2>

    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.profile') }}" class="mt-6 space-y-6">
        @csrf


        <div>
            <label>Phone</label>
            <input type="text" name="phone" value="{{ auth()->user()->profile->phone ?? ''  }}" class="mt-1 block w-full border border-primary rounded">
        </div>
        <div>
            <label>Address</label>
            <input type="text" name="address" value="{{ auth()->user()->profile->address ?? ''  }}" class="mt-1 block w-full border border-primary rounded">
        </div>
        <div>
            <label>Birthday</label>
            <input type="date" name="birthday" value="{{ auth()->user()->profile->birthday ?? ''  }}" class="mt-1 block w-full border border-primary rounded">
        </div>
        <div>
            <label>Gender</label>
            <select name="gender" class="border border-primary rounded">
                <option>---Gender---</option>
                <option {{ optional(auth()->user()->profile)->gender==1 ? 'selected' : ''  }} value="1">Male</option>
                <option {{ optional(auth()->user()->profile)->gender==2 ? 'selected' : ''  }} value="2">Female</option>
                <option {{ optional(auth()->user()->profile)->gender==3 ? 'selected' : ''  }} value="3">Other</option>
            </select>
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
