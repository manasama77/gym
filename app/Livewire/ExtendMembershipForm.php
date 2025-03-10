<?php

namespace App\Livewire;

use App\LogMembershipStatusType;
use Livewire\Component;
use App\Models\GymPackage;
use App\Models\Membership;
use App\Models\LogMembership;
use Livewire\Attributes\Validate;

class ExtendMembershipForm extends Component
{
    #[Validate('required', message: 'Silahkan pilih member')]
    #[Validate('exists:memberships', message: 'Member tidak ditemukan')]
    public string $member_id;

    #[Validate('required', message: 'Paket gym harus dipilih')]
    #[Validate('exists:gym_packages', message: 'Paket gym tidak valid')]
    public string $gym_package_id;

    public object $memberships;
    public object $gym_packages;

    public function mount($memberships)
    {
        $this->member_id = '';
        $this->gym_package_id = '';
        $this->memberships = $memberships;
        $this->gym_packages = collect();
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

        $membership = Membership::findOrFail($validated['membership_id']);
        $gym_package = GymPackage::findOrFail($validated['gym_package_id']);

        $user = LogMembership::create([
            'membership_id' => $validated['membership_id'],
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
