<?php

namespace App\Constants;

class ConfigApp
{
    /*
     * Push color for Application
     */
    public static $ColorPushNotification = '#990000';


    /*
     * Push status to Caddie
     */
    public static $PushGolferCreateNewBooking = 20;
    public static $PushGolferCancelBooking = 21;
    public static $PushGolferPayBooking = 22;


    /*
     * Push status to Golfer
     */
    public static $PushWhenEnoughQuantityCaddieAccept = 50;
    public static $PushWhenCaddieConfirmFinishBooking = 51;
    public static $PushNewTournament = 69;


    /*
     * Status booking
     */
    public static $NewBooking = 1;
    public static $WaitingForAccept = 2;
    public static $WaitingForPay = 3;
    public static $Paid = 4;
    public static $FinishBooking = 5;


    /*
    * Path folder
    */
    public static $FolderPathImageTalent = 'images/talent';
    public static $FolderPathImageDiscovered = 'images/discovered';

}
