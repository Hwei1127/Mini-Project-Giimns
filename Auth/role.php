<?php
session_start();

function isAdmin()
{
    if ( isset( $_SESSION['users'] ) ) {
        if ( $_SESSION['users']['role'] === 'admin' ) {
            return true;
        } 
    } 
        
    return false;
}

function isEditor()
{

        if ( isset( $_SESSION['users'] ) ) {
            if ( 
                $_SESSION['user']['role'] === 'editor' || 
                $_SESSION['user']['role'] === 'admin' 
            ) {
                return true;
            } 
        } 

        return false;

}

function isUser()
{

    if ( isset( $_SESSION['users'] ) ) {
        if ( 
            $_SESSION['users']['role'] === 'admin' || 
            $_SESSION['users']['role'] === 'editor' || 
            $_SESSION['users']['role'] === 'user' 
        ) {
            return true;
        }
    }

    return false;

}


function isGuest()
{

return ! isset( $_SESSION['users'] );

}
