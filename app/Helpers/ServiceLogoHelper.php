<?php

if (!function_exists('getServiceLogo')) {
    function getServiceLogo($serviceName) {
        $serviceName = strtolower(trim($serviceName));
        
        $serviceLogos = [
            'google' => 'https://www.google.com/favicon.ico',
            'gmail' => 'https://ssl.gstatic.com/ui/v1/icons/mail/rfr/gmail.ico',
            'facebook' => 'https://static.xx.fbcdn.net/rsrc.php/yb/r/hLRJ1GG_y0J.ico',
            'twitter' => 'https://abs.twimg.com/favicons/twitter.2.ico',
            'x' => 'https://abs.twimg.com/favicons/twitter.2.ico',
            'instagram' => 'https://static.cdninstagram.com/rsrc.php/v3/yt/r/30PrGfR3xhD.ico',
            'linkedin' => 'https://static.licdn.com/sc/h/al2o9zrvru7aqj8e1x2rzsrca',
            'github' => 'https://github.com/favicon.ico',
            'microsoft' => 'https://c.s-microsoft.com/favicon.ico?v2',
            'outlook' => 'https://res.cdn.office.net/assets/mail/favicon-57ddc81e.ico',
            'apple' => 'https://www.apple.com/favicon.ico',
            'icloud' => 'https://www.icloud.com/favicon.ico',
            'amazon' => 'https://www.amazon.com/favicon.ico',
            'netflix' => 'https://assets.nflxext.com/us/ffe/siteui/common/icons/nficon2016.ico',
            'spotify' => 'https://open.spotify.com/favicon.ico',
            'youtube' => 'https://www.youtube.com/favicon.ico',
            'discord' => 'https://discord.com/assets/f8389ca1a741a115313bede9ac02e2c0.ico',
            'slack' => 'https://a.slack-edge.com/80588/marketing/img/meta/favicon-32.png',
            'zoom' => 'https://st1.zoom.us/zoom.ico',
            'dropbox' => 'https://cfl.dropboxstatic.com/static/images/favicon-vflUeLeeY.ico',
            'paypal' => 'https://www.paypalobjects.com/webstatic/icon/favicon.ico',
            'steam' => 'https://store.steampowered.com/favicon.ico',
            'reddit' => 'https://www.redditstatic.com/desktop2x/img/favicon/favicon-32x32.png',
            'pinterest' => 'https://s.pinimg.com/webapp/favicon-6e0d5d2e.ico',
            'whatsapp' => 'https://static.whatsapp.net/rsrc.php/v3/yz/r/ujTY9i_Jhs1.png',
            'telegram' => 'https://telegram.org/favicon.ico',
            'tiktok' => 'https://sf16-website-login.neutral.ttwstatic.com/obj/tiktok_web_login_static/tiktok/webapp/main/webapp-desktop/favicon.ico',
            'snapchat' => 'https://app.snapchat.com/web/deeplink/snapcode?data=8d91cf02f89a4de79f92a4e0a60320d1~88~MEUCIQDtjJN1YWdmlW3r9NoyBhSzSvLh7-wfvphQPOdgIGRfvwIgEHpZZDgyk_5JjB1qSEK8LRHRzF8VfWdZa0mOvCnRbUo',
            'twitch' => 'https://static.twitchcdn.net/assets/favicon-32-e29e246c157142c94346.png',
            'adobe' => 'https://www.adobe.com/favicon.ico',
            'canva' => 'https://static.canva.com/web/images/favicon.ico',
            'figma' => 'https://static.figma.com/app/icon/1/favicon.ico',
            'notion' => 'https://www.notion.so/images/favicon.ico',
            'trello' => 'https://d2k1ftgv7pobq7.cloudfront.net/meta/c/p/res/images/trello-meta-logo.png',
            'asana' => 'https://d3eizkexujvlb4.cloudfront.net/favicon.ico',
            'wordpress' => 'https://s.w.org/favicon.ico',
            'shopify' => 'https://cdn.shopify.com/shopifycloud/brochure/assets/favicon-f7c7c7b5b5d3c4c7e7c7c7c7c7c7c7c7.ico',
            'ebay' => 'https://ir.ebaystatic.com/cr/v/c1/ebay-logo-1-1200x630-margin.png',
            'airbnb' => 'https://a0.muscache.com/airbnb/static/icons/android-icon-192x192-c0465f9f0380893768972a31a614b670.png',
            'uber' => 'https://d1a3f4spazzrp4.cloudfront.net/uber-com/1.3.8/d1a3f4spazzrp4.cloudfront.net/images/favicon.ico',
            'lyft' => 'https://assets.lyft.com/www/favicon.ico',
            'yahoo' => 'https://s.yimg.com/rz/l/favicon.ico',
            'binance' => 'https://bin.bnbstatic.com/static/images/common/favicon.ico',
            'coinbase' => 'https://images.ctfassets.net/q5ulk4bp65r7/3TBS4oVkD1ghowTqVQJlqj/2dfd4ea3b623a7c0d8deb2ff445dee9e/Consumer_Wordmark.svg',
            'metamask' => 'https://metamask.io/images/favicon.ico',
            'opensea' => 'https://opensea.io/static/images/logos/opensea-logo.svg',
            'banking' => 'https://cdn-icons-png.flaticon.com/32/2830/2830284.png',
            'bank' => 'https://cdn-icons-png.flaticon.com/32/2830/2830284.png',
            'visa' => 'https://cdn.visa.com/v2/assets/images/logos/visa/blue/logo.png',
            'mastercard' => 'https://brand.mastercard.com/content/dam/mccom/brandcenter/thumbnails/mastercard_vrt_rev_92px_2x.png',
            'wells fargo' => 'https://www08.wellsfargomedia.com/assets/images/global/logos/wellsfargo-logo.svg',
            'chase' => 'https://www.chase.com/etc/designs/chase-ux/css/img/chase-logo-blue.svg',
            'bank of america' => 'https://www.bankofamerica.com/etc/designs/boa/favicon.ico'
        ];
        
        if (isset($serviceLogos[$serviceName])) {
            return $serviceLogos[$serviceName];
        }
        
        foreach ($serviceLogos as $service => $logo) {
            if (strpos($serviceName, $service) !== false || strpos($service, $serviceName) !== false) {
                return $logo;
            }
        }
        
        if (strpos($serviceName, '.') !== false || strlen($serviceName) > 3) {
            $faviconUrl = "https://{$serviceName}.com/favicon.ico";
            return $faviconUrl;
        }
        
        return '';
    }
}