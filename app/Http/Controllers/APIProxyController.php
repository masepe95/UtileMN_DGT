<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\TyfonAppointment;
use App\Models\TyfonIntervention;
use App\Models\TyfonContract;
use App\Models\TyfonInterventionProduct;
use App\Models\TyfonContractProduct;
use App\Models\TyfonUser;

class APIProxyController extends Controller
{
    public function proxyRequest(Request $request)
    {
        try {
            TyfonAppointment::truncate();
            TyfonIntervention::truncate();
            TyfonInterventionProduct::truncate();

            $client = new Client();
            $response = $client->get("http://MetanoNord:ty_HKSmAeCEhWwhI3Yl37NaoE3O22Ty2oQ3K2@tyfon.io/appuntamenti/getAllAppuntamentiMetanoNordService");

            $data = json_decode($response->getBody()->getContents(), true);

            foreach ($data as $item) {
                $appointment = new TyfonAppointment();
                $appointment->fill($item);
                $appointment->save();

                if (isset($item['interventi'])) {
                    foreach ($item['interventi'] as $interventionData) {
                        $intervention = new TyfonIntervention();
                        $intervention->fill($interventionData);
                        $intervention->idAppuntamento = $appointment->idAppuntamento;
                        $intervention->save();

                        if (isset($interventionData['prodotti'])) {
                            foreach ($interventionData['prodotti'] as $productData) {
                                $product = new TyfonInterventionProduct();
                                $product->fill($productData);
                                $product->idIntervento = $intervention->idIntervento;
                                $product->save();
                            }
                        }
                    }
                }

                $this->createOrUpdateUser($item);
            }

            return response()->json(['message' => 'Data stored successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function proxyRequest2(Request $request)
    {
        try {
            TyfonContract::truncate();
            TyfonContractProduct::truncate();

            $client = new Client();
            $response = $client->get("http://MetanoNord:ty_HKSmAeCEhWwhI3Yl37NaoE3O22Ty2oQ3K2@tyfon.io/service_machines/getAllContrattiManutenzioneMetanoNordService");

            $data = json_decode($response->getBody()->getContents(), true);

            foreach ($data as $item) {
                $contract = new TyfonContract();
                $contract->fill($item);
                $contract->save();

                if (isset($item['prodotti'])) {
                    foreach ($item['prodotti'] as $prodottiData) {
                        $prodotti = new TyfonContractProduct();
                        $prodotti->fill($prodottiData);
                        $prodotti->idContratto = $contract->idContratto;
                        $prodotti->save();
                    }
                }

                $this->createOrUpdateUser($item);
            }

            return response()->json(['message' => 'Data stored successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    private function createOrUpdateUser($item)
    {
        $userId = $item['cf'] ?? $item['piva'] ?? null;

        if ($userId) {
            TyfonUser::updateOrCreate(
                ['cf' => $userId],
                [
                    'id_lead' => $item['idLead'] ?? null,
                    'cognome' => $item['cognome'] ?? null,
                    'nome' => $item['nome'] ?? null,
                    'ragsoc' => $item['ragsoc'] ?? null,
                    'piva' => $item['piva'] ?? null,
                    'telefono' => $item['telefono'] ?? null,
                    'email' => $item['email'] ?? null,
                    'indirizzo' => $item['indirizzo'] ?? null,
                    'civico' => $item['civico'] ?? null,
                    'cap' => $item['cap'] ?? null,
                    'comune' => $item['comune'] ?? null,
                    'provincia' => $item['provincia'] ?? null,
                    'note' => $item['note'] ?? null
                ]
            );
        }
    }
}
