<?php

namespace App\Enums;

enum PaymentStatusEnum: string
{
    case PENDING = 'pending'; // The payment is still pending and has not yet been processed or confirmed.
    case PROCESSING = 'processing'; // The payment is currently being processed, awaiting confirmation or completion. 
    case COMPLETED = 'completed'; // The payment has been successfully completed and the order can be processed or shipped.      
    case FAILED = 'failed'; // The payment attempt failed due to issues like insufficient funds, declined card, etc.      
    case CANCELLED = 'cancelled'; // The payment was cancelled before it could be completed. Can be done by the customer or the system.       
    case REFUNDED = 'refunded'; // The customer has been refunded for their payment, either fully or partially.
}
