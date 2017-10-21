function MarkNotificationAsRead(notificationCount) {
    if(notificationCount != '0'){
        $.get('/markAsRead');
    }
}

