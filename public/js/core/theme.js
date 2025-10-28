export function initTheme() {
    const themeSwitch = document.getElementById('theme-switch');
    const html = document.documentElement;
    const savedTheme = localStorage.getItem('theme') || 'system';

    if (savedTheme === 'dark') {
        html.classList.add('dark');
        if (themeSwitch) themeSwitch.checked = true;
    }

    themeSwitch?.addEventListener('change', () => {
        if (themeSwitch.checked) {
            html.classList.add('dark');
            localStorage.setItem('theme', 'dark');
        } else {
            html.classList.remove('dark');
            localStorage.setItem('theme', 'light');
        }
        FillFunds.theme.current = themeSwitch.checked ? 'dark' : 'light';
        FillFunds.theme.apply();
    });

    window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
        if (FillFunds.theme.current === 'system') FillFunds.theme.apply();
    });
}