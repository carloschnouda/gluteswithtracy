<?php

namespace App\Http\Middleware;

use App\ContactDetail;
use App\GeneralSetting;
use App\MenuLink;
use App\SocialLink;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class WebsiteMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        function getFixedSettings()
        {
            return GeneralSetting::firstOrFail();
        }

        function getContactDetails()
        {
            return ContactDetail::orderBy('ht_pos')->get();
        }

        function getMenuItems()
        {
            return  MenuLink::orderBy('ht_pos')->get()->keyBy('slug');
        }

        function getSocialLinks() {
            return SocialLink::orderBy('ht_pos')->get();
        }

        $settings = getFixedSettings();
        $contact_details = getContactDetails();
        $menu_items = getMenuItems();
        $social_links = getSocialLinks();

        View::share(compact('settings', 'menu_items', 'contact_details', 'social_links'));

        return $next($request);
    }
}
