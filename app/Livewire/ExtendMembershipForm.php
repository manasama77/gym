<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\GymPackage;
use App\Models\Membership;
use App\Models\LogMembership;
use App\LogMembershipStatusType;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class ExtendMembershipForm extends Component
{
    #[Validate('required', message: 'Silahkan pilih member')]
    #[Validate('exists:memberships,id', message: 'Member tidak ditemukan')]
    public string $member_id;

    #[Validate('required', message: 'Paket gym harus dipilih')]
    #[Validate('exists:gym_packages,id', message: 'Paket gym tidak valid')]
    public string $gym_package_id;

    public object $memberships;
    public object $gym_packages;

    public function mount($memberships)
    {
        $this->gym_package_id = '';
        $this->memberships = $memberships;

        if (Auth::user()->hasRole('user')) {
            $this->member_id = Auth::user()->memberships->id;
            $this->getGymPackages();
        } else {
            $this->member_id = '';
            $this->gym_packages = collect();
        }

    }

    public function getGymPackages()
    {
        $membership = Membership::findOrFail($this->member_id);
        $this->gym_packages = GymPackage::where('member_type', $membership->member_type->value)->get();
    }


    public function updatedMemberId()
    {
        $this->getGymPackages();
    }

    public function save()
    {
        $validated = $this->validate();

        $membership = Membership::findOrFail($validated['member_id']);
        $gym_package = GymPackage::findOrFail($validated['gym_package_id']);

        LogMembership::create([
            'membership_id' => $validated['member_id'],
            'gym_package_id' => $validated['gym_package_id'],
            'gym_package_name' => $gym_package->name,
            'price' => $gym_package->price,
            'duration' => $gym_package->duration,
            'member_type' => $membership->member_type->value,
            'start_date' => null,
            'end_date' => null,
            'status' => LogMembershipStatusType::UNPAID->value,
        ]);

        session()->flash('success', 'Request Extend Membership berhasil dibuat');
        $this->redirect(route('extend-membership'));
    }


    public function render()
    {
        return view('livewire.extend-membership-form');
    }
}
