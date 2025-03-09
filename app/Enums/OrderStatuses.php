<?php
namespace App\Enums;

enum OrderStatuses: string 
{
    case  INPROCESS = 'in_process';
    case  CANCELLED = 'cancelled';
    case  ACCEPTED = 'accepted';
}