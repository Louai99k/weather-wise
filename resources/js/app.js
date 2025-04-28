window.toggleDarkMode = () => {
    const isDark = document.documentElement.classList.toggle("dark");
    window.localStorage.setItem("color-scheme", isDark ? "dark" : "light");
};

const colorScheme = window.localStorage.getItem("color-scheme");

if (!colorScheme) {
    const isSystemDark =
        window.matchMedia &&
        window.matchMedia("(prefers-color-scheme: dark)").matches;

    if (isSystemDark) {
        window.toggleDarkMode();
    }
} else if (colorScheme === "dark") {
    window.toggleDarkMode();
}
