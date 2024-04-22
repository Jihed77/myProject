<?php
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\User;
use App\Form\RegistrationFormType;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class RegistrationController extends AbstractController
{
#[Route('/register', name: 'app_register', methods: ['POST'])]
public function register(Request $request, EntityManagerInterface $entityManager, UserPasswordHasherInterface $passwordHasher): JsonResponse
{
$data = json_decode($request->getContent(), true);

$user = new User();
$form = $this->createForm(RegistrationFormType::class, $user);
$form->submit($data);

if ($form->isSubmitted() && $form->isValid()) {
$hashedPassword = $passwordHasher->hashPassword($user, $user->getPassword());
$user->setPassword($hashedPassword);

$entityManager->persist($user);
$entityManager->flush();

return new JsonResponse(['message' => 'User registered successfully'], Response::HTTP_CREATED);
}

$errors = [];
foreach ($form->getErrors(true, true) as $error) {
$errors[$error->getOrigin()->getName()] = $error->getMessage();
}

return new JsonResponse(['errors' => $errors], Response::HTTP_BAD_REQUEST);
}
}