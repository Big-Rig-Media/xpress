<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class App extends Controller
{
    /**
     * Site Name
     *
     * @return  string  The site name
     */
    public static function siteName()
    {
        return get_bloginfo('name');
    }

    /**
     * Page Title
     *
     * @return  string  The page title
     */
    public static function title()
    {
        if (is_home()) {
            if ($home = get_option('page_for_posts', true)) {
                return get_the_title($home);
            }
            return __('Latest Posts', 'sage');
        }
        if (is_archive()) {
            return get_the_archive_title();
        }
        if (is_search()) {
            return sprintf(__('Search Results for %s', 'sage'), get_search_query());
        }
        if (is_404()) {
            return __('Not Found', 'sage');
        }
        return get_the_title();
    }

    /**
     * Site Branding
     *
     * @return  string  The site's branding
     */
    public function branding()
    {
        if ( get_field('branding', 'option') ) {
            return get_field('branding', 'option');
        }

        return;
    }

    /**
     * Site Phone
     *
     * @return  string  The site's phone number
     */
    public function phone()
    {
        if ( get_field('phone_number', 'option') ) {
            return get_field('phone_number', 'option');
        }

        return;
    }

    /**
     * Google Tag Manager
     *
     * @return  string  The sites Google Tag Manager
     */
    public function tag_manager()
    {
        if ( get_field('tag_manager_id', 'option') ) {
            return get_field('tag_manager_id', 'option');
        }

        return;
    }

    /**
     * Get specified image
     *
     * @param   int     $post
     * @param   string  $size
     */
    public static function image( $id, $size )
    {
        if ( $id && $size ) {
            $featured = wp_get_attachment_image_src( get_post_thumbnail_id($id), $size )[0];

            switch ($size) {
                case 'w960x600':
                    $placeholder = \App\asset_path('images/placeholders/960x600.png');
                break;
                case 'w460x460':
                    $placeholder = \App\asset_path('images/placeholders/460x460.png');
                break;
                case 'w457x288':
                    $placeholder = \App\asset_path('images/placeholders/457x288.png');
                break;
                case 'w182x114':
                    $placeholder = \App\asset_path('images/placeholders/182x114.png');
                break;
                default:
                break;
            }

            $image = has_post_thumbnail($id) ? $featured : $placeholder;

            return $image;
        }

        return;
    }

    /**
     * Social links
     *
     * @return  array   The sites's social media links
     */
    public static function siteSocialLinks()
    {
        $links = [];

        $platforms = [
            'facebook' => [
                'svg'   => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 264 512" class="max-h-icon fill-white"><path d="M76.7 512V283H0v-91h76.7v-71.7C76.7 42.4 124.3 0 193.8 0c33.3 0 61.9 2.5 70.2 3.6V85h-48.2c-37.8 0-45.1 18-45.1 44.3V192H256l-11.7 91h-73.6v229"/></svg>',
                'url'   => get_field('facebook', 'option'),
                'title' => 'Facebook'
            ],
            'tripadvisor' => [
                'svg'   => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="max-h-icon fill-white"><path d="M166.4 280.521c0 13.236-10.73 23.966-23.966 23.966s-23.966-10.73-23.966-23.966 10.73-23.966 23.966-23.966 23.966 10.729 23.966 23.966zm264.962-23.956c-13.23 0-23.956 10.725-23.956 23.956 0 13.23 10.725 23.956 23.956 23.956 13.23 0 23.956-10.725 23.956-23.956-.001-13.231-10.726-23.956-23.956-23.956zm89.388 139.49c-62.667 49.104-153.276 38.109-202.379-24.559l-30.979 46.325-30.683-45.939c-48.277 60.39-135.622 71.891-197.885 26.055-64.058-47.158-77.759-137.316-30.601-201.374A186.762 186.762 0 0 0 0 139.416l90.286-.05a358.48 358.48 0 0 1 197.065-54.03 350.382 350.382 0 0 1 192.181 53.349l96.218.074a185.713 185.713 0 0 0-28.352 57.649c46.793 62.747 34.964 151.37-26.648 199.647zM259.366 281.761c-.007-63.557-51.535-115.075-115.092-115.068C80.717 166.7 29.2 218.228 29.206 281.785c.007 63.557 51.535 115.075 115.092 115.068 63.513-.075 114.984-51.539 115.068-115.052v-.04zm28.591-10.455c5.433-73.44 65.51-130.884 139.12-133.022a339.146 339.146 0 0 0-139.727-27.812 356.31 356.31 0 0 0-140.164 27.253c74.344 1.582 135.299 59.424 140.771 133.581zm251.706-28.767c-21.992-59.634-88.162-90.148-147.795-68.157-59.634 21.992-90.148 88.162-68.157 147.795v.032c22.038 59.607 88.198 90.091 147.827 68.113 59.615-22.004 90.113-88.162 68.125-147.783zm-326.039 37.975v.115c-.057 39.328-31.986 71.163-71.314 71.106-39.328-.057-71.163-31.986-71.106-71.314.057-39.328 31.986-71.163 71.314-71.106 39.259.116 71.042 31.94 71.106 71.199zm-24.512 0v-.084c-.051-25.784-20.994-46.645-46.778-46.594-25.784.051-46.645 20.994-46.594 46.777.051 25.784 20.994 46.645 46.777 46.594 25.726-.113 46.537-20.968 46.595-46.693zm313.423 0v.048c-.02 39.328-31.918 71.194-71.247 71.173s-71.194-31.918-71.173-71.247c.02-39.328 31.918-71.194 71.247-71.173 39.29.066 71.121 31.909 71.173 71.199zm-24.504-.008c-.009-25.784-20.918-46.679-46.702-46.67-25.784.009-46.679 20.918-46.67 46.702.009 25.784 20.918 46.678 46.702 46.67 25.765-.046 46.636-20.928 46.67-46.693v-.009z"/></svg>',
                'url'   => get_field('tripadvisor', 'option'),
                'title' => 'TripAdvisor'
            ],
            'yelp' => [
                'svg'   => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="max-h-icon fill-white"><path d="M136.9 328c-1 .3-109.2 35.7-115.8 35.7-15.2-.9-18.5-16.2-19.9-31.2-1.5-14.2-1.4-29.8.3-46.8 1.9-18.8 5.5-45.1 24.2-44 4.8 0 67.1 25.9 112.7 44.4 17.1 6.8 18.6 35.8-1.5 41.9zm57.9-113.9c1.8 38.2-25.5 48.5-47.2 14.3L41.3 60.4c-1.5-6.6.3-12.4 5.3-17.4C62.2 26.5 146 3.2 168.1 8.9c7.5 1.9 12.1 6.1 13.8 12.6 1.3 8.3 11.5 167.4 12.9 192.6zm-1.4 164.8c0 4.6.2 116.4-1.7 121.5-2.3 6-7 9.7-14.3 11.2-10.1 1.7-27.1-1.9-51-10.7-22-8.1-56.7-21.5-49.3-42.5 2.8-6.9 51.4-62.8 77.3-93.6 12-15.2 39.8-5.5 39 14.1zm180.2-117.8c-5.6 3.7-110.8 28.2-118.1 30.6l.3-.6c-18.1 4.7-35.4-18.5-23.3-34.6 3.7-3.7 65.9-92.4 72.8-97 5.2-3.6 11.3-3.8 18.3-.6 18.4 8.8 55.1 63.1 57.4 84.6-.1 2.9 1.2 11.7-7.4 17.6zm10.1 130.7c-2.7 20.6-44.5 73.4-63.8 81-6.9 2.6-12.9 2-17.7-2-5-3.5-61.8-97.1-64.9-102.3-10.9-16.2 6.8-39.8 25.6-33.2 0 0 110.5 35.7 114.7 39.4 5.2 4.1 7.2 9.8 6.1 17.1z"/></svg>',
                'url'   => get_field('yelp', 'option'),
                'title' => 'Yelp'
            ],
            'twitter' => [
                'svg'   => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="max-h-icon fill-white"><path d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"/></svg>',
                'url'   => get_field('twitter', 'option'),
                'title' => 'Twitter'
            ],
            'google' => [
                'svg'   => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 488 512" class="max-h-icon fill-white"><path d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z"/></svg>',
                'url'   => get_field('google', 'option'),
                'title' => 'Google'
            ],
            'instagram' => [
                'svg'   => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="max-h-icon fill-white"><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/></svg>',
                'url'   => get_field('instagram', 'option'),
                'title' => 'Instagram'
            ],
            'pinterest' => [
                'svg'   => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512" class="max-h-icon fill-white"><path d="M496 256c0 137-111 248-248 248-25.6 0-50.2-3.9-73.4-11.1 10.1-16.5 25.2-43.5 30.8-65 3-11.6 15.4-59 15.4-59 8.1 15.4 31.7 28.5 56.8 28.5 74.8 0 128.7-68.8 128.7-154.3 0-81.9-66.9-143.2-152.9-143.2-107 0-163.9 71.8-163.9 150.1 0 36.4 19.4 81.7 50.3 96.1 4.7 2.2 7.2 1.2 8.3-3.3.8-3.4 5-20.3 6.9-28.1.6-2.5.3-4.7-1.7-7.1-10.1-12.5-18.3-35.3-18.3-56.6 0-54.7 41.4-107.6 112-107.6 60.9 0 103.6 41.5 103.6 100.9 0 67.1-33.9 113.6-78 113.6-24.3 0-42.6-20.1-36.7-44.8 7-29.5 20.5-61.3 20.5-82.6 0-19-10.2-34.9-31.4-34.9-24.9 0-44.9 25.7-44.9 60.2 0 22 7.4 36.8 7.4 36.8s-24.5 103.8-29 123.2c-5 21.4-3 51.6-.9 71.2C65.4 450.9 0 361.1 0 256 0 119 111 8 248 8s248 111 248 248z"/></svg>',
                'url'   => get_field('pinterest', 'option'),
                'title' => 'Pinterest'
            ],
            'linkedin' => [
                'svg'   => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448.1 512" class="max-h-icon fill-white"><path d="M100.3 448H7.4V148.9h92.9V448zM53.8 108.1C24.1 108.1 0 83.5 0 53.8S24.1 0 53.8 0s53.8 24.1 53.8 53.8-24.1 54.3-53.8 54.3zM448 448h-92.7V302.4c0-34.7-.7-79.2-48.3-79.2-48.3 0-55.7 37.7-55.7 76.7V448h-92.8V148.9h89.1v40.8h1.3c12.4-23.5 42.7-48.3 87.9-48.3 94 0 111.3 61.9 111.3 142.3V448h-.1z"/></svg>',
                'url'   => get_field('linkedin', 'option'),
                'title' => 'LinkedIn'
            ],
            'youtube' => [
                'svg'   => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="max-h-icon fill-white"><path d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z"/></svg>',
                'url'   => get_field('youtube', 'option'),
                'title' => 'YouTube'
            ],
            'vimeo' => [
                'svg'   => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="max-h-icon fill-white"><path d="M447.8 153.6c-2 43.6-32.4 103.3-91.4 179.1-60.9 79.2-112.4 118.8-154.6 118.8-26.1 0-48.2-24.1-66.3-72.3C100.3 250 85.3 174.3 56.2 174.3c-3.4 0-15.1 7.1-35.2 21.1L0 168.2c51.6-45.3 100.9-95.7 131.8-98.5 34.9-3.4 56.3 20.5 64.4 71.5 28.7 181.5 41.4 208.9 93.6 126.7 18.7-29.6 28.8-52.1 30.2-67.6 4.8-45.9-35.8-42.8-63.3-31 22-72.1 64.1-107.1 126.2-105.1 45.8 1.2 67.5 31.1 64.9 89.4z"/></svg>',
                'url'   => get_field('vimeo', 'option'),
                'title' => 'Vimeo'
            ],
            'campground-reviews' => [
                'svg'   => '<svg viewBox="0 0 366 130" xmlns="http://www.w3.org/2000/svg" class="max-h-icon fill-white"><g><path d="M0 64.908C0 29.62 32.115 0 70.12 0 90.459 0 109.08 8.41 122 21.573L98.248 41.87c-6.84-8.229-17.103-13.53-28.127-13.53-19.95 0-36.864 16.819-36.864 36.568 0 19.93 16.915 36.752 36.864 36.752 11.212 0 21.287-5.305 28.316-13.53L122 108.242C109.08 121.59 90.458 130 70.12 130 32.116 130 0 100.199 0 64.908M185.612 55.766H244v52.476C230.94 121.953 211.354 130 191.58 130 153.713 130 122 100.195 122 64.908S153.713 0 191.58 0c19.774 0 39.36 8.043 52.42 21.573L220.681 41.87c-6.903-8.413-18.095-13.53-29.101-13.53-19.96 0-36.934 16.819-36.934 36.568 0 19.93 16.974 36.752 36.934 36.752 7.462 0 15.113-2.378 21.454-6.585V79.351h-27.422zM287.35 59.796h24.2c10.818 0 18.515-6.053 18.515-15.136 0-9.085-7.697-15.139-18.514-15.139H287.35zM330.433 130l-27.681-40.683H287.35V130H256V0h58.485c27.681 0 47.85 18.356 47.85 44.66 0 18.92-10.453 33.871-26.768 40.683L366 130z"/></g></svg>',
                'url'   => get_field('campground_reviews', 'option'),
                'title' => 'Campground Reviews'
            ],
            'guest_rated' => [
                'svg'   => '<svg viewBox="0 0 25 26" xmlns="http://www.w3.org/2000/svg" class="max-h-icon fill-white"><g><circle cx="13.5" cy="15.5" r="3.5"/><path d="M14 11.5a3.5 3.5 0 1 1 3.5 3.5 3.5 3.5 0 0 0-3.5-3.5zM6 26h14v-4.178c-.52-2.101-1.953-3.009-4.301-2.725l-2.493 2.725-2.575-2.725c-2.262-.414-3.806.494-4.631 2.725zM17.5 17.895c.754-.856 1.712-1.813 2.875-2.87 2.547-.198 4.082.759 4.605 2.87.027 1.773.027 3.14 0 4.105H21.5c0-1.634-.5-2.801-1.5-3.5-.087 0-.96-.605-2.5-.605zM4.314 9.54C1.764 8.74 0 7.011 0 5.007 0 2.242 3.358 0 7.5 0 11.642 0 15 2.242 15 5.007s-3.358 5.006-7.5 5.006c-.817 0-1.603-.087-2.34-.248.226.084.34.167.34.248-.205 1.161.591 2.515.774 2.987-1.195-1.095-1.946-2.267-2.251-3.517.102.02.199.038.29.057z"/></g></svg>',
                'url'   => get_field('guest_rated', 'option'),
                'title' => 'Guest Rated'
            ],
            'good_sam' => [
                'svg'   => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40.106 59" class="max-h-icon fill-white"><path d="M0 41.229v.001-.006zM11.618 57.153c.006 0 .01-.005.01-.005s-.004.005-.01.005zM11.618 57.153zM16.14 28.984zM12.609 33.154zM21.664 26.837l.004.002-.004-.002zM29.199 37.16h.005-.005zM29.199 37.16z"/><g><path d="M2.777 11.371c2.808 1.767 10.211.927 15.7-.328 1.618-.373 15.759-3.741 14.7-8.451l-.004-.014C32.069-2.127 17.875.974 16.266 1.345 10.773 2.596 3.731 5.06 1.973 7.868c-.506.802-.49 1.493-.39 1.934.1.434.39 1.067 1.194 1.569zM16.84 3.862c7.645-1.745 12.693-1.388 13.706-.676-.605 1.078-5.004 3.592-12.644 5.336-7.634 1.746-12.689 1.388-13.696.679.597-1.078 4.986-3.594 12.634-5.339zM29.199 37.16l-.588.603c-1.438 1.535-4.791 5.128-9.968 5.8-5.176.43-9.204-3.474-10.69-5.176-.538-.536-.977-.508-1.193-.321-.239.205-.284.676.081 1.168 2.079 2.355 5.222 5.911 11.758 5.802 6.5-.117 11.519-7.1 11.567-7.166.321-.485.372-.883.145-1.071-.204-.168-.628-.12-1.112.361zM35.03 31.837c-.01 0-.877-.029-1.103-.526a.663.663 0 01-.055-.269c0-.351.235-.803.701-1.354.181-.242.28-.484.28-.678 0-.109-.032-.208-.108-.271-.209-.194-.615-.045-1.081.393-.054.046-1.41 1.234-1.306 2.593.055.711.497 1.333 1.319 1.852.818.429 1.324.146 1.551-.064.366-.332.524-.927.357-1.325a.542.542 0 00-.555-.351zM23.471 31.674c0-1.702-.604-4.098-1.807-4.837-.015-.009-1.072-.698-1.868.262-1.27 1.221-1.795 4.308-1.681 5.346.026.24.081.385.172.443.65.655 3.852.872 4.985.151.131-.323.199-.804.199-1.365zm-1.844-.066c-.144.144-.406.196-.681.208a.772.772 0 00.283-.592.788.788 0 00-.786-.787.773.773 0 00-.534.215c.063-.72.244-1.694.561-2.15.263-.492.615-.131.615-.131.542.523.723 2.571.542 3.237zM22.49 45.521v-.002c-1.735 1.679-4.66 1.859-7.644.472-.521-.269-.773-.146-.89 0-.223.28-.105.877.148 1.176.745.809 2.341 1.324 4.163 1.347 2.088.027 4-.59 4.995-1.606.516-.588.442-1.128.14-1.408a.63.63 0 00-.912.021z"/><path d="M40.106 30.741c0-.538-.053-1.071-.158-1.568-.524-2.559-2.196-4.425-4.081-4.572a.635.635 0 01-.203-.484c0-.26.107-.569.233-.924l.327-1.474c.008-.334.013-.669.013-.999 0-2.086-.203-3.951-1.18-4.588-.461-.31-1.125-.245-1.903.022.072-.05.171-.113.171-.113.159-.488.228-.931.228-1.329 0-1.121-.534-1.901-1.058-2.4-1.279-1.22-3.545-1.7-5.163-1.103l-4.484 1.222c-4.128 1.205-8.399 2.448-13.367 1.824-1.748-.208-3.042 1.004-3.372 2.247a2.723 2.723 0 00-.086.671c0 1.042.619 2.222 2.388 2.968-1.063 1.631-1.067 3.512-1.072 5.329l-.01 1.058c-.022-.027-.664.326-.664.326-2.942 1.55-8.419 4.443-3.485 17.709 4.159 8.969 9.223 13.807 15.062 14.38 6.464.643 12.437-4.181 15.588-8.504 2.205-3.63 2.757-6.455 2.757-8.806 0-1.27-.158-2.398-.309-3.436l-.152-1.137c2.945-1.444 3.98-4 3.98-6.319zm-6.188 5.551l-.059.029.022.065c2.473 7.502-2.061 14.75-7.82 18.031-4.39 2.508-10.718 3.304-15.311-1.957-9.333-11.607-8.331-19.891-5.378-22.628 1.262-1.168 2.807-1.243 3.928-.187 0 .011.081.203.081.203a7.89 7.89 0 00-.152 1.43c0 .403.049.71.188.792.461.465 2.071.658 3.306.569-.091.022-.254.452-.254.452l-.203.398c-.38.696-1.131 2.053-1.131 4.019 0 .244.015.492.037.75.1 1.329.84 2.294 2.142 2.798 2.424.94 6.031.049 7.51-1.345.709-.624 1.88-1.966 1.73-3.962-.24-.685-.461-1.312-1.659-1.479-.944-.126-2.26-.085-2.839.425l-.294.628c0 .004.268.553.268.553.307.224.8.12 1.32.007.642-.135 1.252-.269 1.496.204.229.513.126 1.071-.299 1.618-1.039 1.338-3.681 2.26-5.538 1.935-.7-.123-1.608-.484-1.943-1.511-.977-2.974 2.229-6.143 3.767-7.671l.632-.638c.099-.104.131-.248.087-.411-.077-.28-.367-.558-.679-.642a.747.747 0 00-.732.214c0 .003-1.677 1.336-1.677 1.336.018-1.627-.583-3.625-1.678-4.303-.01-.004-1.067-.694-1.867.26l-.683.954c-.764-.93-.674-5.314.651-6.81 2.346-2.374 7.137-1.13 10.984-.127l1.08.276c2.211.29 4.074-.475 5.547-1.306-.619.547-1.613 1.419-1.613 1.419-.488.33-.765.918-.765 1.636 0 .084.004.167.015.258 1.37 1.481 1.581 3.409 1.784 5.28.113 1.067.223 2.073.53 2.979.948.285 2.083.074 2.743-.455.018-.021.565-1.39.565-1.39.312-.954.632-1.933 1.496-2.326.904-.531 1.898-.52 2.807.034 1.329.814 2.157 2.548 2.053 4.319-.072 1.286-.718 3.672-4.195 5.277zm-22.43-6.442a.767.767 0 00-.564.247c.056-.724.243-1.73.561-2.197.262-.486.609-.125.609-.125.548.516.723 2.563.556 3.232-.137.132-.375.185-.626.203a.79.79 0 00.251-.571.79.79 0 00-.787-.789z"/></g></svg>',
                'url'   => get_field('good_sam', 'option'),
                'title' => 'Good Sam'
            ],
        ];

        foreach ( $platforms as $key => $platform ) {
            if ( $platform['url'] ) {
                $links[$key] = $platform;
            }
        }

        return $links;
    }

    /**
     * Numbered Pagination
     *
     * @param   object  $query
     * @return  mixed   The HTML output
     */
    public static function pagination( $query )
    {
        $limit = 999999999;

        $pagination = paginate_links([
            'base'    => str_replace($limit, '%#%', esc_url(get_pagenum_link($limit))),
            'format'  => '/page/%#%',
            'current' => max(1, get_query_var('paged')),
            'total'   => $query->max_num_pages,
            'type'    => 'array'
        ]);

        if ( is_array($pagination) ) {
            $output = '<nav>
                            <ol id="menu-pagination-navigation" class="w-full md:w-auto nav">';

            foreach ( $pagination as $page ) {
                $output .= '<li class="menu-item">'.$page.'</li>';
            }

            return $output .= ' </ol>
                            </nav>';
        }

        return;
    }
}
