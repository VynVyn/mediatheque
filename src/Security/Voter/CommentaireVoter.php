<?php

namespace App\Security\Voter;

use DateTime;
use App\Entity\User;
use App\Entity\Document;
use App\Entity\Commentaire;
use App\Repository\DocumentRepository;
use App\Repository\LoanRepository;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;

use function PHPUnit\Framework\returnSelf;

class CommentaireVoter extends Voter
{
    public function __construct(private LoanRepository $loanRepository){

    }
    public const NEW = 'POST_NEW';

    protected function supports(string $attribute, $subject): bool
    {
        return in_array($attribute, [self::NEW])
            && $subject instanceof Document;
    }

    protected function voteOnAttribute(string $attribute, $subject, TokenInterface $token): bool
    {
        $user = $token->getUser();
        if (!$user instanceof User) {
            return false;
        }

        switch ($attribute) {
            case self::NEW:
                    return $this->canNew($subject, $user);
                break;
          
        }

        return false;
    }

    protected function canNew($subject, User $user): bool
    {
        if($user->getValidityDate() >= new DateTime('now') && $this->loanRepository->getOneLoan($user,$subject))
        {
            return true;
        }
        
        return false;
    }
}
