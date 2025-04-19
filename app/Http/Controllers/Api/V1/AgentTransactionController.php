<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\AgentTransactionResource;
use App\Models\AgentTransaction;
use Illuminate\Http\Request;

class AgentTransactionController extends Controller
{
    // Menampilkan daftar transaksi agen
    // public function index()
    // {
    //     try {
    //         $transactions = AgentTransaction::all();
    //         return $this->sendSuccess("Agent transactions fetched successfully", AgentTransactionResource::collection($transactions));
    //     } catch (\Throwable $th) {
    //         return $this->sendError("Failed to get Agent transactions", 200, $th->getMessage());
    //     }
    // }

    // public function index()
    // {
    //     try {
    //         $transactions = AgentTransaction::where('user_id', $this->getUserId(request()))->get();
    //         return $this->sendSuccess("Agent transactions fetched successfully", [
    //             'data' => AgentTransactionResource::collection($transactions)
    //         ]);
    //     } catch (\Throwable $th) {
    //         return $this->sendError("Failed to get Agent transactions list", 200, $th->getMessage());
    //     }
    // }

    // public function index()
    // {
    //     try {
    //         $transactions = AgentTransaction::where('user_id', $this->getUserId(request()))->get();
    //         return $this->sendSuccess("Agent transactions fetched successfully", AgentTransactionResource::collection($transactions));
    //     } catch (\Throwable $th) {
    //         return $this->sendError("Failed to get Agent transactions list", 200, $th->getMessage());
    //     }
    // }


    public function index()
    {
        try {
            $transactions = AgentTransaction::where('user_id', $this->getUserId(request()))->get();
            $transactions = AgentTransactionResource::collection($transactions);

            return response()->json([
                'success' => true,
                'message' => 'Agent transactions fetched successfully',
                'data' => $transactions
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to get Agent transactions list',
                'errors' => $th->getMessage()
            ], 500);
        }
    }




    // Menampilkan detail transaksi agen
    public function show($id)
    {
        try {
            $transaction = AgentTransaction::findOrFail($id);
            return $this->sendSuccess("Agent transaction details", new AgentTransactionResource($transaction));
        } catch (\Throwable $th) {
            return $this->sendError("Failed to get Agent transaction details", 200, $th->getMessage());
        }
    }

    // Menyimpan transaksi agen baru
    // public function store(Request $request)
    // {
    //     try {
    //         $validated = $request->validate([
    //             'name' => 'required|string',
    //             'category' => 'required|string',
    //             'transaction_type' => 'required|string',
    //             'amount' => 'required|numeric',
    //             'balance_before' => 'required|numeric',
    //             'balance_after' => 'required|numeric',
    //             'transaction_date' => 'required|date',
    //         ]);

    //         // $transaction = AgentTransaction::create([
    //         //     'user_id' => $this->getUserId(request()),
    //         //     'name' => $validated['name'],
    //         //     'category' => $validated['category'],
    //         //     'transaction_type' => $validated['transaction_type'],
    //         //     'amount' => $validated['amount'],
    //         //     'balance_before' => $validated['balance_before'],
    //         //     'balance_after' => $validated['balance_after'],
    //         //     'transaction_date' => $validated['transaction_date'],
    //         // ]);

    //         $validated['user_id'] = $this->getUserId($request); // <- INI DITAMBAHKAN

    //         $transaction = AgentTransaction::create($validated);

    //         return $this->sendSuccess("Agent transaction created successfully", new AgentTransactionResource($transaction));
    //     } catch (\Throwable $th) {
    //         return $this->sendError("Failed to create Agent transaction", 200, $th->getMessage());
    //     }
    // }

    public function store(Request $request)
    {
        try {
            $transaction = new AgentTransaction();
            $transaction->name = $request->input('name');
            $transaction->price = $request->input('price');
            $transaction->saldo_awal = $request->input('saldo_awal');
            $transaction->saldo_akhir = $request->input('saldo_akhir');
            $transaction->nilai = $request->input('nilai');
            $transaction->category_id = $request->input('category_id');
            $transaction->nilai_rupiah = $request->input('nilai_rupiah'); // <-- INI YANG KURANG
            $transaction->user_id = $this->getUserId($request); // <-- TAMBAHKAN INI
            $transaction->save();

            return $this->sendSuccess("Agent transaction added successfully", "null");
        } catch (\Throwable $th) {
            return $this->sendError("Failed to add Agent transaction", 200, $th->getMessage());
        }
    }



    // Memperbarui transaksi agen
    public function update(Request $request, $id)
    {
        try {
            $transaction = AgentTransaction::findOrFail($id);

            // Validasi input
            $validated = $request->validate([
                'name' => 'sometimes|required|string',
                'price' => 'sometimes|required|numeric',
                'saldo_awal' => 'sometimes|required|numeric',
                'saldo_akhir' => 'sometimes|required|numeric',
                'nilai' => 'sometimes|required|numeric',
                'category_id' => 'sometimes|required|integer',
                'nilai_rupiah' => 'nullable|numeric', // kalau mau boleh kosong
            ]);

            // Update manual field satu-satu
            if ($request->has('name')) {
                $transaction->name = $request->input('name');
            }
            if ($request->has('price')) {
                $transaction->price = $request->input('price');
            }
            if ($request->has('saldo_awal')) {
                $transaction->saldo_awal = $request->input('saldo_awal');
            }
            if ($request->has('saldo_akhir')) {
                $transaction->saldo_akhir = $request->input('saldo_akhir');
            }
            if ($request->has('nilai')) {
                $transaction->nilai = $request->input('nilai');
            }
            if ($request->has('category_id')) {
                $transaction->category_id = $request->input('category_id');
            }
            if ($request->has('nilai_rupiah')) {
                $transaction->nilai_rupiah = $request->input('nilai_rupiah');
            }

            $transaction->save();

            return $this->sendSuccess("Agent transaction updated successfully", new AgentTransactionResource($transaction));
        } catch (\Throwable $th) {
            return $this->sendError("Failed to update Agent transaction", 200, $th->getMessage());
        }
    }


    // Menghapus transaksi agen
    public function destroy($id)
    {
        try {
            $transaction = AgentTransaction::findOrFail($id);
            $transaction->delete();
            return $this->sendSuccess("Agent transaction deleted successfully", "null");
        } catch (\Throwable $th) {
            return $this->sendError("Failed to delete Agent transaction", 200, $th->getMessage());
        }
    }
}
