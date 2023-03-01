<?php

namespace App\Controller;

use App\Entity\Order;
use App\Form\OrderForm;
use App\Model\OrderModel;
use App\Repository\OrderRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class OrderController extends AbstractController
{
    public function __construct(
        private OrderRepository $orderRepository,
        private OrderModel $orderModel
    ) {}

    public function show(): Response
    {
        $orders = $this->orderRepository->findAll();

        return $this->render('pages/orders/index.html.twig', [
            'orders' => $orders
        ]);
    }

    public function create(Request $request): Response
    {
        $order = new Order();
        $form = $this->createForm(OrderForm::class, $order);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $order = $form->getData();
            $this->orderModel->create($order);

            return $this->redirectToRoute('orders');
        }

        return $this->render('pages/orders/edit.html.twig', [
            'page_title' => 'Create',
            'title' => 'Create Order',
            'form' => $form->createView()
        ]);
    }

    public function edit(Request $request, int $order): Response
    {
        $order = $this->orderRepository->find($order);
        $form = $this->createForm(OrderForm::class, $order);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->orderModel->update();

            return $this->redirectToRoute('orders');
        }

        return $this->render('pages/orders/edit.html.twig', [
            'page_title' => 'Update',
            'title' => 'Update Order',
            'form' => $form->createView()
        ]);
    }

    public function remove(int $order): RedirectResponse
    {
        $order = $this->orderRepository->find($order);
        $this->orderModel->remove($order);

        return $this->redirectToRoute('orders');
    }
}