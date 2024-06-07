<?php

namespace App\Enums;

enum TicketStatus: string
{
  case OPEN = 'open';
  case RESLOVED = 'resolved';
  case REJECTED = 'rejected';
}