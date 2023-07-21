<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class Member
 *
 * @property int $id
 * @property string|null $reference
 * @property string $email
 * @property string|null $email_secondary
 * @property string|null $password
 * @property string|null $password_raw
 * @property string $title
 * @property string $first_name
 * @property string|null $middle_name
 * @property string $last_name
 * @property string $address
 * @property string $city
 * @property string $city_code
 * @property string $country
 * @property string|null $phone
 * @property string $phone_mobile
 * @property string $organization
 * @property string $profession_title
 * @property string $registration_type
 * @property string $registrant_group
 * @property string $tax_id
 * @property string $tax_phone
 * @property string|null $dietary_restrictions
 * @property string|null $special_requirements
 * @property bool $isConsentPdpa
 * @property bool $isConsentCondition
 * @property string $total
 * @property int|null $payment_method
 * @property int $payment_status
 * @property string|null $transaction_id
 * @property string|null $receipt
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|MembersVisa[] $members_visas
 * @property Collection|PaymentTransaction[] $payment_transactions
 *
 * @package App\Models
 */
class Member extends Authenticatable
{
	protected $table = 'members';

	protected $casts = [
		'isConsentPdpa' => 'bool',
		'isConsentCondition' => 'bool',
		'payment_method' => 'int',
		'payment_status' => 'int'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'reference',
		'email',
		'email_secondary',
		'password',
		'password_raw',
		'title',
		'first_name',
		'middle_name',
		'last_name',
		'address',
		'city',
		'city_code',
		'country',
		'phone',
		'phone_mobile',
		'organization',
		'profession_title',
		'registration_type',
		'registrant_group',
		'tax_id',
		'tax_phone',
		'dietary_restrictions',
		'special_requirements',
		'isConsentPdpa',
		'isConsentCondition',
		'total',
		'payment_method',
		'payment_status',
		'transaction_id',
		'receipt'
	];

	public function members_visas()
	{
		return $this->hasMany(MembersVisa::class, 'memberId');
	}

	public function payment_transactions()
	{
		return $this->hasMany(PaymentTransaction::class, 'memberId');
	}
}
