import { TabPanel } from '@wordpress/components';


const onSelect = (tabName) => {
    console.log('Selecting tab', tabName);
};

const CustomTabPanel = ({
    tabs
}) => (
    <TabPanel
        className="my-tab-panel"
        activeClass="active-tab"
        onSelect={onSelect}
        tabs={tabs}
    >
        {(tab) => <div>{tab.content}</div>}
    </TabPanel>
);

export default CustomTabPanel;