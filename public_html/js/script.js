function toggleSidebar() {
    const sidebar = document.querySelector('.sidebar');
    const mainContent = document.querySelector('.main-content');
    
    if (sidebar.style.left === '0px') {
        sidebar.style.left = '-250px';
        mainContent.style.marginLeft = '0';
    } else {
        sidebar.style.left = '0';
        mainContent.style.marginLeft = '250px';
    }
}
