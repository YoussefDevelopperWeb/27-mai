import React from 'react';

const DashboardWidgets = () => {
  return (
    <div>
      <h2 className="text-3xl font-bold mb-4">Dashboard</h2>
      <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <div className="p-4 bg-white rounded shadow-md">Widget 1</div>
        <div className="p-4 bg-white rounded shadow-md">Widget 2</div>
        <div className="p-4 bg-white rounded shadow-md">Widget 3</div>
        {/* Add more widgets as needed */}
      </div>
    </div>
  );
};

export default DashboardWidgets;
