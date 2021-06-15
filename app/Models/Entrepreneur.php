<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Entrepreneur extends Model
{
    protected $fillable = [
        'user_id', 'brand_name', 'company_name', 'city', 'office', 'phone', 'instagram', 'site', 'full_description_ru',
        'house', 'street', 'district', 'image'
    ];

    public static function setImageAndReturnData($request){
        $path = '/admin/image/gap_item';
        $destinationPath = public_path($path);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $request->brand_name . '.' . $request->image->extension();
            $image->move($destinationPath, $name);
            $path = "$path/$name";
        }

        return [
            'user_id'                  => $request->user_id,
            'brand_name'               => $request->brand_name,
            'company_name'             => $request->company_name,
            'city_id'                  => $request->city_id,
            'office'                   => $request->office,
            'phone'                    => $request->phone,
            'instagram'                => $request->instagram,
            'site'                     => $request->site,
            'full_description_ru'      => $request->full_description_ru,
            'house'                    => $request->house,
            'street'                   => $request->street,
            'district'                 => $request->district,
            'image'                    => $path,
            'gap_card_sub_category_id' => $request->gap_card_sub_category_id,
            'discount_percentage'      => $request->discount_percentage,
            'is_checked'               => false,
            'created_at'               => Carbon::now(),
            'updated_at'               => Carbon::now()
        ];
    }
    // is_checked может принять три разный значени.[0 => 'not checked' , 1 = 'success checked', 2 => 'redirect to edit']
    public static function setIsChecked($request){
        $gapCard = GapCardItem::where('id', $request->id)->first();
            $gapCard->update([
                'is_checked' => $request->is_checked
            ]);
    }
}
