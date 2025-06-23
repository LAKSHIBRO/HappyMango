<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inquiries = Inquiry::with('tourPackage')
            ->orderBy('created_at', 'desc')
            ->get();

        $totalInquiries = $inquiries->count();
        $newInquiries = $inquiries->where('status', 'new')->count();
        $processingInquiries = $inquiries->where('status', 'processing')->count();
        $respondedInquiries = $inquiries->where('status', 'responded')->count();
        $confirmedInquiries = $inquiries->where('status', 'confirmed')->count();
        $cancelledInquiries = $inquiries->where('status', 'cancelled')->count();

        return view('backend.pages.inquiry.index', compact(
            'inquiries',
            'totalInquiries',
            'newInquiries',
            'processingInquiries',
            'respondedInquiries',
            'confirmedInquiries',
            'cancelledInquiries'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.inquiry.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tour_id' => 'required|exists:tour_packages,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'date' => 'required|date',
            'adults' => 'required|integer|min:1',
            'children' => 'nullable|integer|min:0',
            'message' => 'nullable|string',
            'status' => 'required|in:new,processing,responded,confirmed,cancelled',
        ]);

        Inquiry::create($request->all());

        return redirect()->route('admin.inquiries')->with('success', 'Inquiry created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $inquiry = Inquiry::with('tourPackage')->findOrFail($id);
        return view('backend.pages.inquiry.show', compact('inquiry'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $inquiry = Inquiry::with('tourPackage')->findOrFail($id);
        return view('backend.pages.inquiry.edit', compact('inquiry'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $inquiry = Inquiry::findOrFail($id);

        $request->validate([
            'tour_id' => 'required|exists:tour_packages,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'date' => 'required|date',
            'adults' => 'required|integer|min:1',
            'children' => 'nullable|integer|min:0',
            'message' => 'nullable|string',
            'status' => 'required|in:new,processing,responded,confirmed,cancelled',
        ]);

        $inquiry->update($request->all());

        return redirect()->route('admin.inquiries')->with('success', 'Inquiry updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $inquiry = Inquiry::findOrFail($id);
        $inquiry->delete();

        return redirect()->route('admin.inquiries')->with('success', 'Inquiry deleted successfully!');
    }

    /**
     * Update inquiry status
     */
    public function updateStatus(Request $request, $id)
    {
        $inquiry = Inquiry::findOrFail($id);
        
        $request->validate([
            'status' => 'required|in:new,processing,responded,confirmed,cancelled',
        ]);

        $inquiry->update(['status' => $request->status]);

        return response()->json([
            'success' => true,
            'message' => 'Status updated successfully!',
            'status' => $request->status
        ]);
    }
} 