import { TabPanel } from '@wordpress/components';


const onSelect = (tabName) => {
    console.log('Selecting tab', tabName);
};

const CustomTabPanel = () => (
    <TabPanel
        className="my-tab-panel"
        activeClass="active-tab"
        onSelect={onSelect}
        tabs={[
            {
                name: 'tab-desktop',
                title: 'Desktop',
                className: 'tab-desktop',
            },
            {
                name: 'tab-tablet',
                title: 'Tablet',
                className: 'tab-tablet',
            },
            {
                name: 'tab-mobile',
                title: 'Mobile',
                className: 'tab-mobile',
            },
        ]}
    >
        {(tab) => <p>{tab.title}</p>}
    </TabPanel>
);

export default CustomTabPanel;