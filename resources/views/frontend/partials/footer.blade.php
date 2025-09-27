<!-- Footer -->
<footer style="
    background-color: #482500;
    color: #FFF;
    padding: 40px 0 20px 0;
    margin: 0;
    width: 100%;
">
    <div style="
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 40px;
    ">
        <!-- Main Footer Content -->
        <div style="
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 40px;
            gap: 60px;
        ">
            <!-- Left - Logo -->
            <div style="
                flex: 1;
                display: flex;
                align-items: flex-start;
            ">
                <img src="{{ asset('logoputih.png') }}" alt="Niranta Logo" style="
                    height: 100px;
                    width: auto;
                    object-fit: contain;
                ">
            </div>
            
            <!-- Center - Menu, Social Media, Alamat -->
            <div style="
                flex: 2;
                display: flex;
                justify-content: space-between;
                gap: 80px;
            ">
                <!-- Menu Column -->
                <div style="
                    display: flex;
                    flex-direction: column;
                    gap: 16px;
                ">
                    <h3 style="
                        color: #FFF;
                        font-family: 'Poppins', sans-serif;
                        font-size: 18px;
                        font-weight: 700;
                        margin: 0 0 8px 0;
                        line-height: 1.2;
                    ">{{ __('messages.footer.menu') }}</h3>
                    <a href="{{ route('home') }}" style="
                        color: #FFF;
                        font-family: 'Inter', sans-serif;
                        font-size: 14px;
                        font-weight: 400;
                        text-decoration: none;
                        line-height: 1.5;
                        opacity: 0.9;
                        transition: opacity 0.3s ease;
                    " onmouseover="this.style.opacity='1'" onmouseout="this.style.opacity='0.9'">Product</a>
                    <a href="#" style="
                        color: #FFF;
                        font-family: 'Inter', sans-serif;
                        font-size: 14px;
                        font-weight: 400;
                        text-decoration: none;
                        line-height: 1.5;
                        opacity: 0.9;
                        transition: opacity 0.3s ease;
                    " onmouseover="this.style.opacity='1'" onmouseout="this.style.opacity='0.9'">Recipe</a>
                    <a href="#" style="
                        color: #FFF;
                        font-family: 'Inter', sans-serif;
                        font-size: 14px;
                        font-weight: 400;
                        text-decoration: none;
                        line-height: 1.5;
                        opacity: 0.9;
                        transition: opacity 0.3s ease;
                    " onmouseover="this.style.opacity='1'" onmouseout="this.style.opacity='0.9'">Blogs</a>
                </div>
                
                <!-- Social Media Column -->
                <div style="
                    display: flex;
                    flex-direction: column;
                    gap: 16px;
                ">
                    <h3 style="
                        color: #FFF;
                        font-family: 'Poppins', sans-serif;
                        font-size: 18px;
                        font-weight: 700;
                        margin: 0 0 8px 0;
                        line-height: 1.2;
                    ">{{ __('messages.footer.social_media') }}</h3>
                    <!-- Social Media Links in Horizontal Layout -->
                    <div style="
                        display: flex;
                        gap: 20px;
                        flex-wrap: wrap;
                        align-items: center;
                    ">
                        <a href="https://www.instagram.com/niranta_palmsugar/" target="_blank" style="
                            color: #FFF;
                            font-family: 'Inter', sans-serif;
                            font-size: 14px;
                            font-weight: 400;
                            text-decoration: none;
                            line-height: 1.5;
                            opacity: 0.9;
                            transition: opacity 0.3s ease;
                            white-space: nowrap;
                        " onmouseover="this.style.opacity='1'" onmouseout="this.style.opacity='0.9'">Instagram</a>
                        <a href="https://wa.me/6281267681068" target="_blank" style="
                            color: #FFF;
                            font-family: 'Inter', sans-serif;
                            font-size: 14px;
                            font-weight: 400;
                            text-decoration: none;
                            line-height: 1.5;
                            opacity: 0.9;
                            transition: opacity 0.3s ease;
                            white-space: nowrap;
                        " onmouseover="this.style.opacity='1'" onmouseout="this.style.opacity='0.9'">WhatsApp</a>
                        <a href="https://www.tiktok.com/@niranta.gula.aren" target="_blank" style="
                            color: #FFF;
                            font-family: 'Inter', sans-serif;
                            font-size: 14px;
                            font-weight: 400;
                            text-decoration: none;
                            line-height: 1.5;
                            opacity: 0.9;
                            transition: opacity 0.3s ease;
                            white-space: nowrap;
                        " onmouseover="this.style.opacity='1'" onmouseout="this.style.opacity='0.9'">TikTok</a>
                    </div>
                </div>
                
                <!-- Alamat Column -->
                <div style="
                    display: flex;
                    flex-direction: column;
                    gap: 16px;
                ">
                    <h3 style="
                        color: #FFF;
                        font-family: 'Poppins', sans-serif;
                        font-size: 18px;
                        font-weight: 700;
                        margin: 0 0 8px 0;
                        line-height: 1.2;
                    ">{{ __('messages.footer.address') }}</h3>
                    <p style="
                        color: #FFF;
                        font-family: 'Inter', sans-serif;
                        font-size: 14px;
                        font-weight: 400;
                        margin: 0;
                        line-height: 1.5;
                        opacity: 0.9;
                    ">Jl. Terandam III no.35, Koto Padang, Sumatera Barat, Indonesia 25121</p>
                </div>
            </div>
            
            <!-- Right - Language Selector -->
            <div style="
                flex: 0 0 auto;
                display: flex;
                align-items: flex-start;
            ">
                <div style="
                    display: flex;
                    align-items: center;
                    gap: 8px;
                    background: transparent;
                    cursor: pointer;
                    transition: all 0.3s ease;
                    padding: 8px 12px;
                    border-radius: 6px;
                " onmouseover="this.style.background='rgba(242, 236, 224, 0.1)'" onmouseout="this.style.background='transparent'"
                   onclick="toggleLanguage()">
                    <!-- Globe Icon from Group.svg -->
                    <svg width="16" height="16" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 13.4121C1 20.3159 6.59625 25.9121 13.5 25.9121C20.4037 25.9121 26 20.3159 26 13.4121C26 6.50836 20.4037 0.912109 13.5 0.912109C6.59625 0.912109 1 6.50836 1 13.4121Z" stroke="#F2ECE0" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M14.7499 0.974609C14.7499 0.974609 18.4999 5.91211 18.4999 13.4121C18.4999 20.9121 14.7499 25.8496 14.7499 25.8496M12.2499 25.8496C12.2499 25.8496 8.49985 20.9121 8.49985 13.4121C8.49985 5.91211 12.2499 0.974609 12.2499 0.974609M1.78735 17.7871H25.2124M1.78735 9.03711H25.2124" stroke="#F2ECE0" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span style="
                        color: #F2ECE0;
                        font-family: 'Inter', sans-serif;
                        font-size: 14px;
                        font-weight: 500;
                    " id="language-text">{{ __('messages.footer.language') }}</span>
                    <!-- Dropdown Arrow -->
                    <img src="{{ asset('panah.png') }}" alt="Dropdown Arrow" style="
                        width: 12px;
                        height: auto;
                        margin-left: 4px;
                        transition: transform 0.3s ease;
                        filter: brightness(0) invert(1);
                    " />
                </div>
            </div>
        </div>
        
    </div>
</footer>

<!-- Bottom Section with Cream Background - UNAND Logo and Copyright -->
<div class="footer-bottom-cream" style="
    background-color: #F2ECE0;
    padding: 2px 0;
    margin: 0;
    width: 100%;
">
    <div style="
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 40px;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 10px;
    ">
        <!-- UNAND Logo -->
        <div style="
            display: flex;
            justify-content: center;
            margin-bottom: 10px;
        ">
            <img src="{{ asset('unand.png') }}" alt="UNAND Logo" style="
                height: 40px;
                width: auto;
                object-fit: contain;
            ">
        </div>
        
        <!-- Copyright Text -->
        <p style="
            color: #333;
            font-family: 'Inter', sans-serif;
            font-size: 12px;
            font-weight: 400;
            margin: 0;
            text-align: center;
            line-height: 0.1;
            opacity: 0.8;
        ">
{{ __('messages.footer.copyright') }}</p>
    </div>
</div>

<!-- Footer Responsive Styles -->
<style>
    /* Footer Responsive Design */
    @media (max-width: 1024px) {
        footer > div > div:first-child {
            flex-direction: column !important;
            gap: 40px !important;
            align-items: center !important;
        }
        
        footer > div > div:first-child > div:nth-child(2) {
            gap: 60px !important;
            justify-content: center !important;
        }
        
        footer > div > div:first-child > div:first-child {
            align-self: center !important;
        }
        
        footer > div > div:first-child > div:last-child {
            align-self: center !important;
        }
    }
    
    @media (max-width: 768px) {
        footer {
            padding: 40px 0 30px 0 !important;
        }
        
        footer > div {
            padding: 0 20px !important;
        }
        
        /* Main footer content - stack vertically */
        footer > div > div:first-child {
            flex-direction: column !important;
            gap: 30px !important;
            align-items: center !important;
            text-align: center !important;
        }
        
        /* Center content - 3 columns to vertical stack */
        footer > div > div:first-child > div:nth-child(2) {
            flex-direction: column !important;
            gap: 25px !important;
            text-align: center !important;
            width: 100% !important;
            max-width: 300px !important;
        }
        
        /* Each column center aligned */
        footer > div > div:first-child > div:nth-child(2) > div {
            align-items: center !important;
            text-align: center !important;
        }
        
        /* Typography adjustments for mobile */
        footer > div > div:first-child > div:nth-child(2) h3 {
            font-size: 16px !important;
            margin-bottom: 12px !important;
        }
        
        footer > div > div:first-child > div:nth-child(2) a,
        footer > div > div:first-child > div:nth-child(2) p {
            font-size: 13px !important;
            text-align: center !important;
        }
        
        /* Language selector adjustments */
        footer > div > div:first-child > div:last-child {
            margin-top: 10px !important;
        }
        
        /* Bottom cream section adjustments */
        .footer-bottom-cream {
            padding: 25px 0 !important;
        }
        
        .footer-bottom-cream > div {
            padding: 0 20px !important;
            gap: 15px !important;
        }
        
        .footer-bottom-cream img {
            height: 35px !important;
        }
        
        .footer-bottom-cream p {
            font-size: 10px !important;
            padding: 0 15px !important;
            line-height: 1.3 !important;
        }
    }
    
    @media (max-width: 480px) {
        footer {
            padding: 30px 0 25px 0 !important;
        }
        
        footer > div {
            padding: 0 15px !important;
        }
        
        /* Extra small screens - more compact */
        footer > div > div:first-child {
            gap: 25px !important;
        }
        
        footer > div > div:first-child > div:nth-child(2) {
            gap: 20px !important;
            max-width: 280px !important;
        }
        
        footer > div > div:first-child > div:nth-child(2) h3 {
            font-size: 15px !important;
        }
        
        footer > div > div:first-child > div:nth-child(2) a,
        footer > div > div:first-child > div:nth-child(2) p {
            font-size: 12px !important;
        }
        
        /* Language selector smaller */
        footer > div > div:first-child > div:last-child > div {
            padding: 6px 10px !important;
            font-size: 13px !important;
        }
        
        footer > div > div:first-child > div:last-child > div span:last-child {
            font-size: 12px !important;
        }
        
        /* Bottom cream section - extra small */
        .footer-bottom-cream {
            padding: 20px 0 !important;
        }
        
        .footer-bottom-cream > div {
            padding: 0 15px !important;
            gap: 15px !important;
        }
        
        .footer-bottom-cream img {
            height: 30px !important;
        }
        
        .footer-bottom-cream p {
            font-size: 9px !important;
            padding: 0 10px !important;
        }
    }
</style>

<!-- Translation JavaScript -->
<script>
function toggleLanguage() {
    const currentLocale = '{{ app()->getLocale() }}';
    const newLocale = currentLocale === 'id' ? 'en' : 'id';
    
    // Show loading state
    const languageText = document.getElementById('language-text');
    const originalText = languageText.textContent;
    languageText.textContent = 'Loading...';
    
    // Redirect to switch language
    window.location.href = `/translate/switch/${newLocale}`;
}

// Dynamic content translation function
async function translateDynamicContent(text, targetLang = 'en') {
    try {
        const response = await fetch('/translate/dynamic', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                text: text,
                target_language: targetLang,
                source_language: 'id'
            })
        });
        
        const data = await response.json();
        
        if (response.ok) {
            return data.translated_text || text;
        } else {
            // Handle specific error cases
            if (response.status === 429) {
                console.warn('Rate limit exceeded for translation');
                // Show user-friendly message
                showTranslationMessage('Translation rate limit exceeded. Please wait a moment.');
            } else if (response.status === 503) {
                console.warn('Translation service temporarily unavailable');
                showTranslationMessage('Translation service temporarily unavailable. Using original text.');
            } else {
                console.error('Translation error:', data.error);
                showTranslationMessage('Translation temporarily unavailable.');
            }
            
            return data.fallback_text || text; // Return fallback text
        }
    } catch (error) {
        console.error('Translation request failed:', error);
        showTranslationMessage('Translation service unavailable.');
        return text; // Return original text if request fails
    }
}

// Function to show translation status messages
function showTranslationMessage(message) {
    // Create or update status message element
    let statusEl = document.getElementById('translation-status');
    if (!statusEl) {
        statusEl = document.createElement('div');
        statusEl.id = 'translation-status';
        statusEl.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            background: #482500;
            color: #F2ECE0;
            padding: 12px 20px;
            border-radius: 6px;
            font-size: 14px;
            z-index: 9999;
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
        `;
        document.body.appendChild(statusEl);
    }
    
    statusEl.textContent = message;
    statusEl.style.display = 'block';
    
    // Auto-hide after 5 seconds
    setTimeout(() => {
        statusEl.style.display = 'none';
    }, 5000);
}

// Helper function to translate all dynamic content on page
async function translatePageContent() {
    const currentLocale = '{{ app()->getLocale() }}';
    
    if (currentLocale === 'en') {
        // Find all elements with data-translate attribute
        const translatableElements = document.querySelectorAll('[data-translate]');
        
        for (const element of translatableElements) {
            const originalText = element.getAttribute('data-original') || element.textContent;
            element.setAttribute('data-original', originalText);
            
            const translatedText = await translateDynamicContent(originalText, 'en');
            element.textContent = translatedText;
        }
    }
}

// Run translation on page load if needed
document.addEventListener('DOMContentLoaded', function() {
    translatePageContent();
});
</script>
