<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seeker extends Model
{
    protected $connection = 'mysql';
    use HasFactory;
    protected $guarded;

    public function userResults()
    {
        return $this->hasMany(Result::class, 'seeker_id', 'id');
    }


    public function user()
    {
        return $this->belongsTo(Admin::class);
    }

    public function rank()
    {
        return Rank::find($this->rank_id);
    }

    public function level()
    {
        return $this->belongsTo(Rank::class, 'rank_id');
    }

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function skill()
    {
        return $this->hasMany(Skill::class);
    }

    public function avatar()
    {
        return $this->hasMany(Avatars::class);
    }

    public function photo()
    {
        return Avatars::find($this->seeker_id);
    }

    public function signature()
    {
        return $this->hasOne(Signatures::class);
    }
    public function accountDetail()
    {
        return $this->hasOne(AccountDetail::class);
    }

    public function comments()
    {
        return $this->belongsTo(CommentAMDs::class);
    }
    public function Testimony()
    {
        return $this->belongsTo(Testimonies::class);
    }

    public function ministryJob()
    {
       return $this->hasMany(MinistryJob::class);
    }
    public function education()
    {
        return $this->hasOne(Education::class,'seeker_id');
    }


    public function appraisal()
    {
        return $this->hasMany(Appraisals::class);
    }


    public function full_name()
    {
        return ucfirst(strtolower($this->first_name)) ." ".ucfirst(strtolower($this->last_name));
    }

    public function JoinCommunity()
    {
        return $this->hasMany(JoinCommunity::class);
    }
    public function Partnershiparm()
    {
        return $this->hasMany(PartnershipArm::class);
    }
    public function recruitment()
    {
        return $this->hasMany(Recruitment::class);
    }
    public function healthinformation()
    {
        return $this->hasMany(HealthInformation::class);
    }
    public function MinistryCommitment()
    {
        return $this->hasMany(MinistryCommitment::class);
    }public function Child()
    {
        return $this->hasMany(Child::class);
    }

    public function joinedCommunities()
    {
        return $this->belongsToMany(Communities::class, 'join_communities');
    }
    public function isJoinedTo(Communities $community)
    {
        return (bool)  $this->JoinCommunity->where('communities_id', $community->id)->count();
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
    public function grade()
    {
        return $this->hasMany(Grade::class);
    }

    public function wallcomments()
    {

        return $this->hasMany(Wallcomment::class);
    }
    public function payslip()
    {

        return $this->hasMany(Payslip::class );
    }
    public function reimbursable()
    {

        return $this->hasMany(Reimbursable::class );
    }
    public function taxpay()
    {

        return $this->hasOne(Taxpay::class);
    }
    public function credentials()
    {
        return $this->hasMany(Credentials::class);
    }
    public function panel()
    {

        return $this->hasOne(Panel::class);
    }
    public function recommendation()
    {

        return $this->hasOne(Recommendation::class);
    }
    public function pastorRecommendation()
    {

        return $this->hasOne(PastorRecommendation::class);
    }

    public function ManifestsUser()
    {

        return $this->hasOne(ManifestsUser::class);
    }

}
