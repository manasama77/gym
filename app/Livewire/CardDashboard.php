<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Membership;
use App\Models\LogMembership;
use App\LogMembershipStatusType;

class CardDashboard extends Component
{
    public string $type;
    public string $title;
    public string $value;

    public function mount()
    {
        $this->title = "-";
        $this->value = "0";
    }

    public function render()
    {
        $memberships = Membership::all();

        if ($this->type === 'total_member_aktif') {
            $this->title = "TOTAL MEMBER AKTIF";
            $this->value = $memberships->where('status', true)->count();
        } elseif ($this->type === 'total_member_non_aktif') {
            $this->title = "TOTAL MEMBER NON AKTIF";
            $this->value = $memberships->where('status', false)->count();
        } elseif ($this->type  === 'total_request_extend_membership') {
            $this->title = "TOTAL REQUEST EXTEND MEMBERSHIP";
            $this->value = LogMembership::all()->where('status', LogMembershipStatusType::UNPAID->value)->count();
        }

        return view('livewire.card-dashboard');
    }
}
