<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebsiteSetting extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        // Basic Information
        'Result',
        'স্বাস্থ্য ও পরিবার কল্যাণ মন্ত্রানালয়',
        'slogan',
        'short_description',

        // Contact Information
        'contact_email',
        'contact_phone',
        'contact_phone2',
        'helpline',

        // Location & Address
        'address_line1',
        'address_line2',
        'city',
        'state',
        'zip_code',
        'country',

        // Office Information
        'office_location',
        'office_hours',
        'office_days',

        // Legal & Copyright
        'copyright_name',
        'copyright_year',
        'company_name',

        // Logo & Favicon
        'logo_path',
        'favicon_path',
        'footer_logo_path',

        // Footer Content
        'footer_description',
        'footer_copyright',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the settings instance (singleton pattern)
     * 
     * @return WebsiteSetting
     */
    public static function getSettings()
    {
        return static::first() ?? new static();
    }

    /**
     * Get a specific setting value
     * 
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public static function get($key, $default = null)
    {
        $settings = static::getSettings();
        return $settings->$key ?? $default;
    }

    /**
     * Update multiple settings at once
     * 
     * @param array $data
     * @return WebsiteSetting
     */
    public static function updateSettings(array $data)
    {
        $settings = static::first();

        if (!$settings) {
            $settings = new static();
        }

        $settings->fill($data);
        $settings->save();

        return $settings;
    }

    /**
     * Get full address as a single string
     * 
     * @return string
     */
    public function getFullAddressAttribute()
    {
        $addressParts = [
            $this->address_line1,
            $this->address_line2,
            $this->city,
            $this->state,
            $this->zip_code,
            $this->country,
        ];

        return implode(', ', array_filter($addressParts));
    }

    /**
     * Get primary contact phone
     * 
     * @return string
     */
    public function getPrimaryPhoneAttribute()
    {
        return $this->contact_phone ?: $this->helpline;
    }

    /**
     * Get copyright text with year
     * 
     * @return string
     */
    public function getCopyrightTextAttribute()
    {
        $year = $this->copyright_year ?: date('Y');
        $name = $this->copyright_name ?: $this->company_name;

        return $name ? "&copy; {$year} {$name}" : "&copy; {$year}";
    }

    /**
     * Check if logo exists
     * 
     * @return bool
     */
    public function getHasLogoAttribute()
    {
        return !empty($this->logo_path);
    }

    /**
     * Check if favicon exists
     * 
     * @return bool
     */
    public function getHasFaviconAttribute()
    {
        return !empty($this->favicon_path);
    }

    /**
     * Get office hours and days combined
     * 
     * @return string
     */
    public function getOfficeScheduleAttribute()
    {
        $schedule = [];

        if ($this->office_days) {
            $schedule[] = $this->office_days;
        }

        if ($this->office_hours) {
            $schedule[] = $this->office_hours;
        }

        return implode(', ', $schedule);
    }

    /**
     * Scope to get only contact information
     * 
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeContactInfo($query)
    {
        return $query->select([
            'contact_email',
            'contact_phone',
            'contact_phone2',
            'helpline',
            'address_line1',
            'address_line2',
            'city',
            'state',
            'zip_code',
            'country',
            'office_location',
            'office_hours',
            'office_days',
        ]);
    }

    /**
     * Scope to get only basic information
     * 
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeBasicInfo($query)
    {
        return $query->select([
            'Result',
            'স্বাস্থ্য ও পরিবার কল্যাণ মন্ত্রানালয়',
            'slogan',
            'short_description',
            'logo_path',
            'favicon_path',
        ]);
    }

    /**
     * Scope to get only footer information
     * 
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFooterInfo($query)
    {
        return $query->select([
            'footer_description',
            'footer_copyright',
            'copyright_name',
            'copyright_year',
            'company_name',
            'footer_logo_path',
        ]);
    }

    /**
     * Boot method for model events
     */
    protected static function boot()
    {
        parent::boot();

        // Create default settings if none exist
        static::created(function ($settings) {
            // You can add any post-creation logic here
        });
    }
}
